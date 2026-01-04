<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

class Onyx_Dark_Mode_Switcher_Settings {
    public function __construct() {
        // Create a Setting Page
        add_action('admin_menu', array($this, 'register_menu_page'));

        // Get posts by query
        add_action('wp_ajax_onyx_settings_save', array($this, 'handle_settingform'));

        add_action('wp_ajax_onyx_replace_image_fields_options', array($this, 'get_replace_image_fields_options'));
        add_action('wp_ajax_onyx_invert_image_fields_options', array($this, 'get_invert_image_fields_options'));
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
        add_menu_page(esc_html__('Onyx Dark Mode Switcher', 'onyx-dark-mode-switcher'), esc_html__('Onyx Dark Mode Switcher', 'onyx-dark-mode-switcher'), 'manage_options', 'smds-settings', array($this, 'setting_config'), 'dashicons-admin-customizer', 80);
    }

    public function setting_config() {
        include ONYX_PATH . 'admin/inc/settings/init.php';
    }

    public function handle_settingform() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error('You are not allowed to perform this action.');
        }

        if (wp_verify_nonce(onyx_get_post('onyx_nonce'), 'onyx_nonce_update_settings')) {
            $settings = onyx_get_post_data_arr('onyx_settings');
            $settings = onyx_recursive_parse_args($settings, self::checkbox_settings());
            $settings = onyx_sanitize_array($settings, self::sanitize_setting_rules());

            update_option('onyx_settings', $settings);
            wp_send_json_success(array('message' => esc_html__('Settings Saved!', 'onyx-dark-mode-switcher')));
        }
    }

    public static function checkbox_settings() {
        return array(
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
            'replace_images' => '',
            'invert_images' => '',
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
            'buttom_size' => 'onyx_sanitize_number',
            'switch_in_menu' => 'onyx_sanitize_checkbox',
            'switch_menu' => 'sanitize_text_field',
            'button_shadow_x' => 'onyx_sanitize_number',
            'button_shadow_y' => 'onyx_sanitize_number',
            'button_shadow_blur' => 'onyx_sanitize_number',
            'button_shadow_color' => 'sanitize_text_field',
            'button_bg_color' => 'onyx_sanitize_color',
            'dark_mode_button_bg' => 'onyx_sanitize_color',
            'button_icon_color' => 'onyx_sanitize_color',
            'dark_mode_button_icon_color' => 'onyx_sanitize_color',
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
        $count = onyx_get_post('count');
        $this->replace_image_fields_options($count);
        die();
    }

    public function get_invert_image_fields_options() {
        $count = onyx_get_post('count');
        $this->replace_invert_image_fields_options($count);
        die();
    }

    public static function replace_invert_image_fields_options($count, $value = '') {
        ?>
        <div class="onyx-replace-image-fields">
            <div class=" onyx-setting-replace-image-list">
            <div class="onyx-replace-image">
                <label><?php esc_html_e('Image URL', 'onyx-dark-mode-switcher'); ?></label>
                <input type="text" name="onyx_settings[invert_images][<?php echo esc_attr($count); ?>]" value="<?php echo esc_attr($value); ?>" />
                <button type="button" class="button"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
            </div>
        </div>
        <button type="button" class="button onyx-remove-image-value"><i class="mdi-trash-can-outline"></i><?php esc_html_e('Delete', 'onyx-dark-mode-switcher'); ?></button>
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
                <button type="button" class="button"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
            </div>

            <div class="onyx-replace-image">
                <label><?php esc_html_e('Dark Mode', 'onyx-dark-mode-switcher'); ?></label>
                <input type="text" name="onyx_settings[replace_images][<?php echo esc_attr($count); ?>][dark_image]" placeholder="Dark Image" value="<?php echo esc_attr($dark_image); ?>" />
                <button type="button" class="button"><?php esc_html_e('Select Image', 'onyx-dark-mode-switcher'); ?></button>
            </div>
        </div>
        <button type="button" class="button onyx-remove-image-value"><i class="mdi-trash-can-outline"></i><?php esc_html_e('Delete', 'onyx-dark-mode-switcher'); ?></button>
        </div>
        <?php
    }

}

new Onyx_Dark_Mode_Switcher_Settings();