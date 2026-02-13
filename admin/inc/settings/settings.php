<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-settings-content" id="onyx-settings">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Enable Dark/Light Mode', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable]" <?php checked($onyx_settings['enable'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
                <p class="onyx-desc">
                    <?php esc_html_e('Enables Dark/List Mode for WordPress.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Enable Dark Mode on Start', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_default_dark_mode]" <?php checked($onyx_settings['enable_default_dark_mode'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('OS Aware Dark Mode', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_os_aware]" <?php checked($onyx_settings['enable_os_aware'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Enable Key Board Shortcode', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_keyboard_shortcode]" <?php checked($onyx_settings['enable_keyboard_shortcode'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
                <p class="onyx-desc"><?php esc_html_e('Enable to dark mode by pressing Ctrl+Shift+D.', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Elements Control', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Skip Dark Mode on Selectors', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <textarea class="onyx-class-field" name="onyx_settings[disallowed_elements]"><?php echo esc_textarea($onyx_settings['disallowed_elements']); ?></textarea>
                <p class="onyx-desc"><?php esc_html_e('Enter comma separated HTML tags, CSS class or CSS ids. Eg #mast-head, .container, footer', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Apply Button Styles to Classes', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <textarea class="onyx-class-field" name="onyx_settings[allowed_button_classes]"><?php echo esc_textarea($onyx_settings['allowed_button_classes']); ?></textarea>
                <p class="onyx-desc"><?php esc_html_e('Enter comma separated CSS class to inherit button color changes. Eg .btn, .header-button', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>
    </div>
</div>