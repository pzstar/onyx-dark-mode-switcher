<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-settings-content" id="onyx-colors-settings" style="display: none;">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Preset Colors', 'onyx-dark-mode-switcher'); ?></label>

            <div class="onyx-settings-field">
                <select name="onyx_settings[preset_style]" data-condition="toggle" id="onyx-preset-style">
                    <option value="custom" <?php selected($onyx_settings['preset_style'], 'custom'); ?>><?php esc_html_e('Custom', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-1" <?php selected($onyx_settings['preset_style'], 'style-1'); ?>><?php esc_html_e('Style 1', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-2" <?php selected($onyx_settings['preset_style'], 'style-2'); ?>><?php esc_html_e('Style 2', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-3" <?php selected($onyx_settings['preset_style'], 'style-3'); ?>><?php esc_html_e('Style 3', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-4" <?php selected($onyx_settings['preset_style'], 'style-4'); ?>><?php esc_html_e('Style 4', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-5" <?php selected($onyx_settings['preset_style'], 'style-5'); ?>><?php esc_html_e('Style 5', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-6" <?php selected($onyx_settings['preset_style'], 'style-6'); ?>><?php esc_html_e('Style 6', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-7" <?php selected($onyx_settings['preset_style'], 'style-7'); ?>><?php esc_html_e('Style 7', 'onyx-dark-mode-switcher') ?></option>
                    <option value="style-8" <?php selected($onyx_settings['preset_style'], 'style-8'); ?>><?php esc_html_e('Style 8', 'onyx-dark-mode-switcher') ?></option>
                </select>
                <p class="onyx-desc"><?php esc_html_e('Sets Preset Color', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style" data-condition-val="custom">
            <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-two-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Primary Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_bg]" value="<?php echo esc_attr($onyx_settings['dark_mode_bg']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Secondary Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_secondary_bg]" value="<?php echo esc_attr($onyx_settings['dark_mode_secondary_bg']); ?>">
                    </div>
                </li>
            </ul>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style" data-condition-val="custom">
            <label><?php esc_html_e('Text Color', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-three-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Text Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_text_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_text_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Link Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_link_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_link_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Link Color(Hover)', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_link_hover_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_link_hover_color']); ?>">
                    </div>
                </li>
            </ul>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style" data-condition-val="custom">
            <label><?php esc_html_e('Input', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-three-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_input_bg]" value="<?php echo esc_attr($onyx_settings['dark_mode_input_bg']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Text Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_input_text_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_input_text_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Placeholder Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_input_placeholder_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_input_placeholder_color']); ?>">
                    </div>
                </li>
        </div>


        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style" data-condition-val="custom">
            <label><?php esc_html_e('Border Color', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field onyx-color-input-field">
                <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_border_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_border_color']); ?>">
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style" data-condition-val="custom">
            <label><?php esc_html_e('Button', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-two-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Text Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_btn_text_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_btn_text_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_btn_bg]" value="<?php echo esc_attr($onyx_settings['dark_mode_btn_bg']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Text Color(Hover)', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_btn_text_color_hover]" value="<?php echo esc_attr($onyx_settings['dark_mode_btn_text_color_hover']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color(Hover)', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_btn_bg_hover]" value="<?php echo esc_attr($onyx_settings['dark_mode_btn_bg_hover']); ?>">
                    </div>
                </li>
            </ul>

        </div>

    </div>
</div>