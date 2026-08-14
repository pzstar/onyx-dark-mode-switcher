<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

class Onyx_Dark_Mode_Switcher_Settings {

    /**
     * Post meta key for the per page "disable dark mode" checkbox.
     */
    const DISABLE_META_KEY = '_onyx_disable_dark_mode';

    public function __construct() {
        // Create a Setting Page
        add_action('admin_menu', array($this, 'register_menu_page'));

        // Get posts by query
        add_action('wp_ajax_onyx_settings_save', array($this, 'handle_settingform'));

        add_action('wp_ajax_onyx_replace_image_fields_options', array($this, 'get_replace_image_fields_options'));
        add_action('wp_ajax_onyx_invert_image_fields_options', array($this, 'get_invert_image_fields_options'));
        add_action('wp_ajax_onyx_color_override_fields_options', array($this, 'get_color_override_fields_options'));

        // Tools tab
        add_action('wp_ajax_onyx_export_settings', array($this, 'handle_export'));
        add_action('wp_ajax_onyx_import_settings', array($this, 'handle_import'));
        add_action('wp_ajax_onyx_reset_settings', array($this, 'handle_reset'));
    }

    public static function get_settings() {
        $settings = get_option('onyx_settings');

        if (!$settings) {
            $settings = self::default_settings_values();
        } else {
            $settings = onyx_recursive_parse_args($settings, self::default_settings_values());
        }

        return $settings;
    }

    public function register_menu_page() {
        add_menu_page(esc_html__('Onyx Dark Mode Switcher', 'onyx-dark-mode-switcher'), esc_html__('Onyx Dark Mode Switcher', 'onyx-dark-mode-switcher'), 'manage_options', 'onyx-settings', array($this, 'setting_config'), 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="4 2 58 58" fill="currentColor"><path d="M54.95 21.99a12 12 0 0 0-.5-4.69 11.85 11.85 0 0 0-7.8-7.76c-1.52-.48-3.18-.64-4.7-.48-6.1.6-10.71 5.68-10.71 11.82 0 6.55 5.33 11.88 11.88 11.88 6.17 0 11.26-4.63 11.83-10.77M42.12 3v2.962a1 1 0 1 0 2 0V3a1 1 0 1 0-2 0m0 32.797v2.962a1 1 0 1 0 2 0v-2.962a1 1 0 1 0-2 0M61 19.88h-2.962a1 1 0 1 0 0 2H61a1 1 0 1 0 0-2m-35.759 2h2.962a1 1 0 1 0 0-2h-2.962a1 1 0 1 0 0 2m31.23-14.351a1 1 0 0 0-1.414 0l-2.095 2.095a.999.999 0 1 0 1.414 1.414l2.095-2.095a1 1 0 0 0 0-1.414M30.478 34.522a1 1 0 0 0 .707-.293l2.095-2.095a.999.999 0 1 0-1.414-1.414l-2.095 2.095a.999.999 0 0 0 .707 1.707m24.579-.293a.997.997 0 0 0 1.414 0 1 1 0 0 0 0-1.414l-2.095-2.095a.999.999 0 1 0-1.414 1.414zm-25.286-26.7a1 1 0 0 0 0 1.414l2.095 2.095a.997.997 0 0 0 1.414 0 1 1 0 0 0 0-1.414l-2.095-2.095a1 1 0 0 0-1.414 0"/><path d="M29.829 60c9.18 0 17.637-4.687 22.242-12.135a28.7 28.7 0 0 1-8.957 1.411c-15.345 0-27.829-11.975-27.829-26.694 0-2.96.492-5.833 1.465-8.574C8.928 18.404 4 26.511 4 35.306 4 48.922 15.587 60 29.829 60m-11.747-5.725a1 1 0 0 1 1.334-.469q.51.245 1.05.461a1 1 0 0 1-.742 1.858 19 19 0 0 1-1.173-.516 1 1 0 0 1-.469-1.334M7.533 40.085a.996.996 0 0 1 1.23.695c.019.066 1.909 6.68 7.414 11.004.435.341.511.97.169 1.403a.995.995 0 0 1-1.403.169C8.906 48.615 6.918 41.61 6.836 41.313a1 1 0 0 1 .697-1.229z"/></svg>'), 80);
    }

    public function setting_config() {
        include ONYX_PATH . 'admin/inc/settings/init.php';
    }

    public function handle_settingform() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => esc_html__('You are not allowed to perform this action.', 'onyx-dark-mode-switcher')));
        }

        if (!wp_verify_nonce(onyx_get_post('onyx_nonce'), 'onyx_nonce_update_settings')) {
            wp_send_json_error(array('message' => esc_html__('Security check failed. Please reload the page and try again.', 'onyx-dark-mode-switcher')));
        }

        self::persist_settings(onyx_get_post_data_arr('onyx_settings'));

        wp_send_json_success(array('message' => esc_html__('Settings Saved!', 'onyx-dark-mode-switcher')));
    }

    /**
     * Validate a raw settings array and write it to the option.
     *
     * The form save and the import both funnel through here, so an uploaded
     * file goes through exactly the same sanitization as a form submission.
     */
    public static function persist_settings($raw) {
        // Drop keys the plugin does not know about, so a hand edited import
        // cannot park arbitrary data in the option.
        $settings = array_intersect_key((array) $raw, self::default_settings_values());

        $settings = onyx_recursive_parse_args($settings, self::checkbox_settings());
        $settings = onyx_sanitize_array($settings, self::sanitize_setting_rules());

        // Narrow the post type list to types that actually exist, so a stale or
        // forged slug can never linger in the option.
        $settings['disabled_post_types'] = onyx_sanitize_post_types($settings['disabled_post_types']);

        update_option('onyx_settings', $settings);

        return $settings;
    }

    /**
     * Hand the current settings back as JSON for the browser to download.
     */
    public function handle_export() {
        $this->verify_ajax_request();

        wp_send_json_success(array(
            'filename' => 'onyx-dark-mode-settings-' . gmdate('Y-m-d') . '.json',
            'settings' => self::get_settings(),
        ));
    }

    /**
     * Replace the stored settings with the contents of an exported file.
     */
    public function handle_import() {
        $this->verify_ajax_request();

        $raw = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- JSON, validated below and sanitized by persist_settings().

        if (!is_string($raw) || $raw === '') {
            wp_send_json_error(array('message' => esc_html__('No file contents were received.', 'onyx-dark-mode-switcher')));
        }

        $decoded = json_decode($raw, true);

        if (!is_array($decoded) || json_last_error() !== JSON_ERROR_NONE) {
            wp_send_json_error(array('message' => esc_html__('That file is not valid Onyx settings JSON.', 'onyx-dark-mode-switcher')));
        }

        // Guard against a valid-JSON file that has nothing to do with Onyx.
        if (!array_intersect_key($decoded, self::default_settings_values())) {
            wp_send_json_error(array('message' => esc_html__('That file does not contain any Onyx settings.', 'onyx-dark-mode-switcher')));
        }

        self::persist_settings($decoded);

        wp_send_json_success(array('message' => esc_html__('Settings imported.', 'onyx-dark-mode-switcher')));
    }

    /**
     * Put every setting back to its shipped default.
     */
    public function handle_reset() {
        $this->verify_ajax_request();

        update_option('onyx_settings', self::default_settings_values());

        wp_send_json_success(array('message' => esc_html__('Settings reset to defaults.', 'onyx-dark-mode-switcher')));
    }

    /**
     * Shared guard for the image-field AJAX endpoints.
     */
    private function verify_ajax_request() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => esc_html__('You are not allowed to perform this action.', 'onyx-dark-mode-switcher')));
        }

        check_ajax_referer('onyx_admin_nonce', 'nonce');
    }

    /**
     * Defaults for fields the browser omits from the POST body when they are
     * empty: unchecked checkboxes, and multi-select lists with nothing picked.
     * Without an entry here, clearing such a field would leave the old value in
     * place instead of clearing it.
     */
    public static function checkbox_settings() {
        return array(
            'disabled_post_types' => array(),
            'color_overrides' => array(),
            'enable_schedule' => 'off',
            'enable' => 'off',
            'enable_button' => 'off',
            'switch_in_menu' => 'off',
            'enable_default_dark_mode' => 'off',
            'enable_os_aware' => 'off',
            'enable_keyboard_shortcode' => 'off',
            'enable_tooltip' => 'off',
            'enable_image_grayscale' => 'off',
            'enable_video_grayscale' => 'off',
            'darken_background_images' => 'off',
            'invert_svg' => 'off'
        );
    }

    public static function sanitize_setting_rules() {
        return array(
            'enable' => 'onyx_sanitize_checkbox',
            'enable_button' => 'onyx_sanitize_checkbox',
            'enable_default_dark_mode' => 'onyx_sanitize_checkbox',
            'enable_os_aware' => 'onyx_sanitize_checkbox',
            'enable_schedule' => 'onyx_sanitize_checkbox',
            'schedule_start' => 'onyx_sanitize_time',
            'schedule_end' => 'onyx_sanitize_time',
            'disabled_post_types' => array('*' => 'sanitize_key'),
            'enable_keyboard_shortcode' => 'onyx_sanitize_checkbox',
            'enable_image_grayscale' => 'onyx_sanitize_checkbox',
            'enable_video_grayscale' => 'onyx_sanitize_checkbox',
            'enable_tooltip' => 'onyx_sanitize_checkbox',
            'tooltip_text' => 'sanitize_text_field',
            'disallowed_elements' => 'sanitize_text_field',
            'allowed_button_classes' => 'sanitize_text_field',
            'button_position' => 'sanitize_text_field',
            'button_shape' => 'sanitize_text_field',
            'preset_style' => 'sanitize_text_field',
            'replace_images' => array('*' => array('*' => 'esc_url_raw')),
            'invert_images' => array('*' => 'esc_url_raw'),
            'color_overrides' => array('*' => array(
                'selector' => 'onyx_sanitize_css_selector',
                'bg' => 'onyx_sanitize_color',
                'text' => 'onyx_sanitize_color',
                'border' => 'onyx_sanitize_color',
            )),
            'dark_mode_bg' => 'onyx_sanitize_color',
            'dark_mode_secondary_bg' => 'onyx_sanitize_color',
            'dark_mode_text_color' => 'onyx_sanitize_color',
            'dark_mode_link_color' => 'onyx_sanitize_color',
            'dark_mode_link_hover_color' => 'onyx_sanitize_color',
            'dark_mode_input_bg' => 'onyx_sanitize_color',
            'dark_mode_input_text_color' => 'onyx_sanitize_color',
            'dark_mode_input_placeholder_color' => 'onyx_sanitize_color',
            'dark_mode_border_color' => 'onyx_sanitize_color',
            'dark_mode_btn_text_color' => 'onyx_sanitize_color',
            'dark_mode_btn_bg' => 'onyx_sanitize_color',
            'dark_mode_btn_text_color_hover' => 'onyx_sanitize_color',
            'dark_mode_btn_bg_hover' => 'onyx_sanitize_color',
            'button_offset_top' => 'onyx_sanitize_number',
            'button_offset_bottom' => 'onyx_sanitize_number',
            'button_offset_left' => 'onyx_sanitize_number',
            'button_offset_right' => 'onyx_sanitize_number',
            'button_size' => 'onyx_sanitize_number',
            'button_icon_size' => 'onyx_sanitize_number',
            'switch_in_menu' => 'onyx_sanitize_checkbox',
            'switch_menu' => 'sanitize_text_field',
            'button_shadow_x' => 'onyx_sanitize_number',
            'button_shadow_y' => 'onyx_sanitize_number',
            'button_shadow_blur' => 'onyx_sanitize_number',
            'button_shadow_color' => 'onyx_sanitize_color',
            'button_bg_color' => 'onyx_sanitize_color',
            'dark_mode_button_bg' => 'onyx_sanitize_color',
            'button_icon_color' => 'onyx_sanitize_color',
            'dark_mode_button_icon_color' => 'onyx_sanitize_color',
            'switch_bg_color' => 'onyx_sanitize_color',
            'switch_icon_color' => 'onyx_sanitize_color',
            'switch_selector' => 'sanitize_text_field',
            'before_js' => 'onyx_sanitize_custom_js',
            'after_js' => 'onyx_sanitize_custom_js',
            'custom_css' => 'onyx_sanitize_custom_css',
            'button_light_icon' => 'sanitize_text_field',
            'button_dark_icon' => 'sanitize_text_field',
            'darken_background_images' => 'onyx_sanitize_checkbox',
            'darken_level' => 'onyx_sanitize_number',
            'invert_svg' => 'onyx_sanitize_checkbox',
            'menu_switch_margin_top' => 'onyx_sanitize_number',
            'menu_switch_margin_bottom' => 'onyx_sanitize_number',
            'menu_switch_margin_left' => 'onyx_sanitize_number',
            'menu_switch_margin_right' => 'onyx_sanitize_number',
            'menu_switch_size' => 'onyx_sanitize_number'
        );
    }

    public static function default_settings_values() {
        return array(
            'enable' => 'on',
            'enable_button' => 'on',
            'enable_default_dark_mode' => 'off',
            'enable_os_aware' => 'off',
            'enable_schedule' => 'off',
            'schedule_start' => '20:00',
            'schedule_end' => '06:00',
            'disabled_post_types' => array(),
            'enable_keyboard_shortcode' => 'off',
            'enable_image_grayscale' => 'off',
            'enable_video_grayscale' => 'off',
            'enable_tooltip' => 'on',
            'tooltip_text' => 'Toggle Dark Mode',
            'disallowed_elements' => '',
            'allowed_button_classes' => '',
            'button_position' => 'bottom-left',
            'button_shape' => 'round',
            'preset_style' => 'style-1',
            'replace_images' => array(),
            'invert_images' => array(),
            'color_overrides' => array(),
            'dark_mode_bg' => '',
            'dark_mode_secondary_bg' => '',
            'dark_mode_text_color' => '',
            'dark_mode_link_color' => '',
            'dark_mode_link_hover_color' => '',
            'dark_mode_input_bg' => '',
            'dark_mode_input_text_color' => '',
            'dark_mode_input_placeholder_color' => '',
            'dark_mode_border_color' => '',
            'dark_mode_btn_text_color' => '',
            'dark_mode_btn_bg' => '',
            'dark_mode_btn_text_color_hover' => '',
            'dark_mode_btn_bg_hover' => '',
            'button_offset_top' => '',
            'button_offset_bottom' => '',
            'button_offset_left' => '',
            'button_offset_right' => '',
            'button_size' => '',
            'button_icon_size' => '',
            'switch_in_menu' => 'off',
            'switch_menu' => '',
            'button_shadow_x' => '',
            'button_shadow_y' => '',
            'button_shadow_blur' => '',
            'button_shadow_color' => '',
            'button_bg_color' => '',
            'dark_mode_button_bg' => '',
            'button_icon_color' => '',
            'dark_mode_button_icon_color' => '',
            'switch_bg_color' => '',
            'switch_icon_color' => '',
            'switch_selector' => '',
            'before_js' => '',
            'after_js' => '',
            'custom_css' => '',
            'button_light_icon' => 'sunfill',
            'button_dark_icon' => 'moonfill',
            'darken_background_images' => 'on',
            'darken_level' => 80,
            'invert_svg' => 'off',
            'menu_switch_margin_top' => '',
            'menu_switch_margin_bottom' => '',
            'menu_switch_margin_left' => '',
            'menu_switch_margin_right' => '',
            'menu_switch_size' => 60
        );
    }

    public function get_replace_image_fields_options() {
        $this->verify_ajax_request();
        $count = onyx_get_post('count');
        $this->replace_image_fields_options($count);
        die();
    }

    public function get_invert_image_fields_options() {
        $this->verify_ajax_request();
        $count = onyx_get_post('count');
        $this->replace_invert_image_fields_options($count);
        die();
    }

    public function get_color_override_fields_options() {
        $this->verify_ajax_request();
        $count = onyx_get_post('count');
        $this->color_override_fields_options($count);
        die();
    }

    /**
     * One row of the per selector colour override repeater.
     */
    public static function color_override_fields_options($count, $override = array()) {
        $selector = isset($override['selector']) ? $override['selector'] : '';
        $fields = array(
            'bg' => esc_html__('Background', 'onyx-dark-mode-switcher'),
            'text' => esc_html__('Text', 'onyx-dark-mode-switcher'),
            'border' => esc_html__('Border', 'onyx-dark-mode-switcher'),
        );
        ?>
        <div class="onyx-replace-image-fields onyx-color-override-row">
            <div class="onyx-setting-replace-image-list">
                <div class="onyx-replace-image">
                    <label><?php esc_html_e('CSS Selector', 'onyx-dark-mode-switcher'); ?></label>
                    <input type="text" placeholder=".site-header, #footer" name="onyx_settings[color_overrides][<?php echo esc_attr($count); ?>][selector]" value="<?php echo esc_attr($selector); ?>" />
                    <button type="button" class="button onyx-button onyx-remove-image-value"><i class="mdi-trash-can-outline"></i><?php esc_html_e('Delete', 'onyx-dark-mode-switcher'); ?></button>
                </div>

                <ul class="onyx-three-column-row">
                    <?php foreach ($fields as $onyx_key => $onyx_label) { ?>
                        <li class="onyx-settings-list">
                            <label><?php echo esc_html($onyx_label); ?></label>
                            <div class="onyx-settings-field onyx-color-input-field">
                                <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[color_overrides][<?php echo esc_attr($count); ?>][<?php echo esc_attr($onyx_key); ?>]" value="<?php echo esc_attr(isset($override[$onyx_key]) ? $override[$onyx_key] : ''); ?>" />
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
    }

    public static function replace_invert_image_fields_options($count, $value = '') {
        ?>
        <div class="onyx-replace-image-fields">
            <div class=" onyx-setting-replace-image-list">
                <div class="onyx-replace-image">
                    <label><?php esc_html_e('Image URL', 'onyx-dark-mode-switcher'); ?></label>
                    <input type="text" name="onyx_settings[invert_images][<?php echo esc_attr($count); ?>]" value="<?php echo esc_attr($value); ?>" />
                    <button type="button" class="button onyx-button onyx-media-uploader"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
                </div>
            </div>
            <button type="button" class="button onyx-button onyx-remove-image-value"><i class="mdi-trash-can-outline"></i><?php esc_html_e('Delete', 'onyx-dark-mode-switcher'); ?></button>
        </div>
        <?php
    }

    public static function replace_image_fields_options($count, $org_image = '', $dark_image = '') {
        ?>
        <div class="onyx-replace-image-fields">
            <div class=" onyx-setting-replace-image-list">
                <div class="onyx-replace-image">
                    <label><?php esc_html_e('Normal Mode', 'onyx-dark-mode-switcher'); ?></label>
                    <input type="text" name="onyx_settings[replace_images][<?php echo esc_attr($count); ?>][org_image]" placeholder="Original Image" value="<?php echo esc_attr($org_image); ?>" />
                    <button type="button" class="button onyx-button onyx-media-uploader"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
                </div>

                <div class="onyx-replace-image">
                    <label><?php esc_html_e('Dark Mode', 'onyx-dark-mode-switcher'); ?></label>
                    <input type="text" name="onyx_settings[replace_images][<?php echo esc_attr($count); ?>][dark_image]" placeholder="Dark Image" value="<?php echo esc_attr($dark_image); ?>" />
                    <button type="button" class="button onyx-button onyx-media-uploader"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
                </div>
            </div>
            <button type="button" class="button onyx-remove-image-value"><i class="mdi-trash-can-outline"></i><?php esc_html_e('Delete', 'onyx-dark-mode-switcher'); ?></button>
        </div>
        <?php
    }

}

new Onyx_Dark_Mode_Switcher_Settings();