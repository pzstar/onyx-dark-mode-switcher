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
                <div class="onyx-preset-stripe-field">
                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-1"  type="radio" name="onyx_settings[preset_style]" value="style-1" <?php checked($onyx_settings['preset_style'], 'style-1'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-1"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-2"  type="radio" name="onyx_settings[preset_style]" value="style-2" <?php checked($onyx_settings['preset_style'], 'style-2'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-2"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-3" type="radio" name="onyx_settings[preset_style]" value="style-3" <?php checked($onyx_settings['preset_style'], 'style-3'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-3"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-4" type="radio" name="onyx_settings[preset_style]" value="style-4" <?php checked($onyx_settings['preset_style'], 'style-4'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-4"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-5" type="radio" name="onyx_settings[preset_style]" value="style-5" <?php checked($onyx_settings['preset_style'], 'style-5'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-5"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-6" type="radio" name="onyx_settings[preset_style]" value="style-6" <?php checked($onyx_settings['preset_style'], 'style-6'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-6"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-7" type="radio" name="onyx_settings[preset_style]" value="style-7" <?php checked($onyx_settings['preset_style'], 'style-7'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-7"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-8" type="radio" name="onyx_settings[preset_style]" value="style-8" <?php checked($onyx_settings['preset_style'], 'style-8'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-8"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-9" type="radio" name="onyx_settings[preset_style]" value="style-9" <?php checked($onyx_settings['preset_style'], 'style-9'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-9"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-10" type="radio" name="onyx_settings[preset_style]" value="style-10" <?php checked($onyx_settings['preset_style'], 'style-10'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-10"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-11" type="radio" name="onyx_settings[preset_style]" value="style-11" <?php checked($onyx_settings['preset_style'], 'style-11'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-11"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-12" type="radio" name="onyx_settings[preset_style]" value="style-12" <?php checked($onyx_settings['preset_style'], 'style-12'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-12"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-13" type="radio" name="onyx_settings[preset_style]" value="style-13" <?php checked($onyx_settings['preset_style'], 'style-13'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-13"></span>
                    </label>

                    <label>
                        <input class="onyx-preset-radio-box" data-condition="toggle" id="onyx-preset-style-custom" type="radio" name="onyx_settings[preset_style]" value="custom" <?php checked($onyx_settings['preset_style'], 'custom'); ?> />
                        <span class="onyx-preset-stripe onyx-preset-style-custom"><?php esc_html_e('Custom', 'onyx-dark-mode-switcher'); ?></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Preview', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-preview-panel" id="onyx-preview-panel">
                    <div class="onyx-preview-bar">
                        <span class="onyx-preview-dot"></span>
                        <span class="onyx-preview-dot"></span>
                        <span class="onyx-preview-dot"></span>
                    </div>
                    <div class="onyx-preview-body">
                        <h4 class="onyx-preview-heading"><?php esc_html_e('Heading text', 'onyx-dark-mode-switcher'); ?></h4>
                        <p class="onyx-preview-text">
                            <?php esc_html_e('Body copy sits on the primary background, with', 'onyx-dark-mode-switcher'); ?>
                            <a href="#" class="onyx-preview-link" onclick="return false;"><?php esc_html_e('a link', 'onyx-dark-mode-switcher'); ?></a>
                            <?php esc_html_e('running through it.', 'onyx-dark-mode-switcher'); ?>
                        </p>
                        <div class="onyx-preview-card">
                            <span class="onyx-preview-text"><?php esc_html_e('Secondary background', 'onyx-dark-mode-switcher'); ?></span>
                        </div>
                        <div class="onyx-preview-controls">
                            <input type="text" class="onyx-preview-input" placeholder="<?php esc_attr_e('Placeholder text', 'onyx-dark-mode-switcher'); ?>" readonly>
                            <button type="button" class="onyx-preview-button"><?php esc_html_e('Button', 'onyx-dark-mode-switcher'); ?></button>
                        </div>
                    </div>
                </div>
                <p class="onyx-desc">
                    <?php esc_html_e('Updates as you pick a preset or edit a custom color. Nothing is saved until you press Save Settings.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style-custom">
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

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style-custom">
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

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style-custom">
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
            </ul>
        </div>


        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style-custom">
            <label><?php esc_html_e('Border Color', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field onyx-color-input-field">
                <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_border_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_border_color']); ?>">
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-preset-style-custom">
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

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Selector Overrides', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Override Colors by Selector', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-replace-image-values-wrap onyx-color-override-wrap">
                    <?php
                    $onyx_count = 0;

                    foreach ((array) $onyx_settings['color_overrides'] as $onyx_override) {
                        if (is_array($onyx_override) && !empty($onyx_override['selector'])) {
                            self::color_override_fields_options($onyx_count, $onyx_override);
                        }
                        $onyx_count++;
                    }
                    ?>
                </div>

                <button type="button" class="button onyx-add-color-override"><i class="mdi-plus"></i><?php esc_html_e('Add Override', 'onyx-dark-mode-switcher'); ?></button>
                <input type="hidden" class="onyx-color-override-count" value="<?php echo esc_attr($onyx_count); ?>" />

                <p class="onyx-desc">
                    <?php esc_html_e('Force specific colors onto elements the automatic pass gets wrong. Leave a color empty to leave that property alone. These rules only apply in dark mode.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

    </div>
</div>