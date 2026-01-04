<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-settings-content" id="onyx-custom-code-settings" style="display: none;">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Before Toggle JavaScript', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <textarea class="onyx-codemirror-js-textarea" name="onyx_settings[before_js]"><?php echo onyx_sanitize_custom_js($onyx_settings['before_js']); ?></textarea>
                <p class="onyx-desc"><?php esc_html_e('This code runs just before the toggle is executed.', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('After Toggle JavaScript', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <textarea class="onyx-codemirror-js-textarea" name="onyx_settings[after_js]"><?php echo onyx_sanitize_custom_js($onyx_settings['after_js']); ?></textarea>
                <p class="onyx-desc"><?php esc_html_e('This code runs after the toggle is completed.', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Custom CSS', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <textarea class="onyx-codemirror-css-textarea" name="onyx_settings[custom_css]"><?php echo onyx_sanitize_custom_css($onyx_settings['custom_css']); ?></textarea>
                <p class="onyx-desc">
                    <?php
                    echo esc_html__('Don\'t include <style></style> tag', 'onyx-dark-mode-switcher');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>