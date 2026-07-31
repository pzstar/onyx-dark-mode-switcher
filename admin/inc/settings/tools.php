<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-settings-content" id="onyx-tools-settings" style="display: none;">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Export &amp; Import', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Export Settings', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <button type="button" class="button onyx-export-settings"><i class="mdi-download-outline"></i><?php esc_html_e('Download JSON', 'onyx-dark-mode-switcher'); ?></button>
                <p class="onyx-desc">
                    <?php esc_html_e('Saves every setting on this page to a file you can keep as a backup or move to another site.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Import Settings', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <input type="file" class="onyx-import-file" accept="application/json,.json" />
                <button type="button" class="button onyx-import-settings"><i class="mdi-upload-outline"></i><?php esc_html_e('Import', 'onyx-dark-mode-switcher'); ?></button>
                <p class="onyx-desc">
                    <?php esc_html_e('Choose a file exported from Onyx. This replaces every current setting, so export a backup first if you are unsure.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Reset', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Reset to Defaults', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <button type="button" class="button onyx-reset-settings"><i class="mdi-restore"></i><?php esc_html_e('Reset All Settings', 'onyx-dark-mode-switcher'); ?></button>
                <p class="onyx-desc">
                    <?php esc_html_e('Puts every setting back to the way it shipped. Custom colors, code and image rules are all cleared. This cannot be undone.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>
    </div>
</div>
