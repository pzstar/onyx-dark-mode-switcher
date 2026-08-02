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
                <button type="button" class="button onyx-button onyx-export-settings"><i class="mdi-download-outline"></i><?php esc_html_e('Download JSON', 'onyx-dark-mode-switcher'); ?></button>
                <p class="onyx-desc">
                    <?php esc_html_e('Saves every setting on this page to a file you can keep as a backup or move to another site.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Import Settings', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-import-dropzone" tabindex="0" role="button" aria-label="<?php esc_attr_e('Choose a JSON file or drop one here', 'onyx-dark-mode-switcher'); ?>">
                    <input type="file" class="onyx-import-file" accept="application/json,.json" />

                    <div class="onyx-dropzone-prompt">
                        <span class="onyx-dropzone-icon"><i class="mdi-cloud-upload-outline"></i></span>
                        <span class="onyx-dropzone-title"><?php esc_html_e('Drop your JSON file here', 'onyx-dark-mode-switcher'); ?></span>
                        <span class="onyx-dropzone-hint"><?php
                            printf(
                                /* translators: %s: "browse" link text. */
                                esc_html__('or %s to choose a file', 'onyx-dark-mode-switcher'),
                                '<span class="onyx-dropzone-browse">' . esc_html__('browse', 'onyx-dark-mode-switcher') . '</span>'
                            );
                        ?></span>
                    </div>

                    <div class="onyx-dropzone-file">
                        <span class="onyx-dropzone-file-icon"><i class="mdi-file-code-outline"></i></span>
                        <span class="onyx-dropzone-file-meta">
                            <span class="onyx-dropzone-file-name"></span>
                            <span class="onyx-dropzone-file-size"></span>
                        </span>
                        <button type="button" class="onyx-dropzone-clear" aria-label="<?php esc_attr_e('Remove file', 'onyx-dark-mode-switcher'); ?>"><i class="mdi-close"></i></button>
                    </div>
                </div>

                <button type="button" class="button onyx-button onyx-import-settings" disabled><i class="mdi-upload-outline"></i><?php esc_html_e('Import', 'onyx-dark-mode-switcher'); ?></button>
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
                <button type="button" class="button onyx-button onyx-reset-settings"><i class="mdi-restore"></i><?php esc_html_e('Reset All Settings', 'onyx-dark-mode-switcher'); ?></button>
                <p class="onyx-desc">
                    <?php esc_html_e('Puts every setting back to the way it shipped. Custom colors, code and image rules are all cleared. This cannot be undone.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>
    </div>
</div>
