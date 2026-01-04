<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$onyx_replace_images = $onyx_settings['replace_images'];
$onyx_invert_images = $onyx_settings['invert_images'];
?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-settings-content" id="onyx-image-video-settings" style="display: none;">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Images', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Enable Image GrayScale', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_image_grayscale]" <?php checked($onyx_settings['enable_image_grayscale'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Darken Background Images', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input id="onyx-barken-bg-image" type="checkbox" name="onyx_settings[darken_background_images]" <?php checked($onyx_settings['darken_background_images'], 'on'); ?> data-condition="toggle">
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-barken-bg-image">
            <label><?php esc_html_e('Darken Level', 'onyx-dark-mode-switcher'); ?></label>

            <div class="onyx-settings-input-field">
                <div class="onyx-range-slider-field">
                    <div class="onyx-range-slider"></div>
                    <input type="number" name="onyx_settings[darken_level]" value="<?php echo esc_attr($onyx_settings['darken_level']); ?>" class="onyx-range-input" min="1" max="100" step="1"> %
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Replace Images', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-replace-image-values-wrap">
                    <?php
                    $onyx_count = 0;
                    foreach ($onyx_replace_images as $onyx_val) {
                        if (trim($onyx_val['org_image']) && trim($onyx_val['dark_image'])) {
                            self::replace_image_fields_options($onyx_count, $onyx_val['org_image'], $onyx_val['dark_image']);
                        }
                        $onyx_count++;
                    }
                    ?>
                </div>

                <button type="button" class="button onyx-add-replace-image"><i class="mdi-plus"></i><?php esc_html_e('Add Images', 'onyx-dark-mode-switcher'); ?></button>
                <input type="hidden" class="onyx-image-count" value="<?php echo esc_attr($onyx_count); ?>" />
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Invert Images', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-replace-image-values-wrap">
                    <?php
                    $onyx_count = 0;
                    foreach ($onyx_invert_images as $onyx_val) {
                        if (trim($onyx_val)) {
                            self::replace_invert_image_fields_options($onyx_count, $onyx_val);
                        }
                        $onyx_count++;
                    }
                    ?>
                </div>

                <button type="button" class="button onyx-add-invert-image"><i class="mdi-plus"></i><?php esc_html_e('Add Images', 'onyx-dark-mode-switcher'); ?></button>
                <input type="hidden" class="onyx-invert-image-count" value="<?php echo esc_attr($onyx_count); ?>" />
            </div>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Videos', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Enable Video GrayScale', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_video_grayscale]" <?php checked($onyx_settings['enable_video_grayscale'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('SVG', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Invert SVGs', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[invert_svg]" <?php checked($onyx_settings['invert_svg'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>