<?php
defined('ABSPATH') || die();

$onyx_settings = Onyx_Dark_Mode_Switcher_Settings::get_settings();
?>
<h2 class="onyx-main-title">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"></path>
    </svg>
    <?php echo esc_html__('Onyx Dark Mode Switcher', 'onyx-dark-mode-switcher'); ?>
</h2>

<form method="POST">
    <input type="hidden" name="updated" value="true" />
    <?php wp_nonce_field('onyx_nonce_update_settings', 'onyx_nonce'); ?>
    <div class="onyx-settings-main-wrapper">
        <div class="onyx-settings-inner-wrap">
            <div class="onyx-tab-options-wrap">
                <ul>
                    <li class="onyx-tab onyx-tab-active" data-tab="onyx-settings" data-tohide="onyx-tab-content"><?php esc_html_e('Settings', 'onyx-dark-mode-switcher'); ?></li>
                    <li class="onyx-tab" data-tab="onyx-switch-settings" data-tohide="onyx-tab-content"><?php esc_html_e('Switch', 'onyx-dark-mode-switcher'); ?></li>
                    <li class="onyx-tab" data-tab="onyx-image-video-settings" data-tohide="onyx-tab-content"><?php esc_html_e('Image/Video', 'onyx-dark-mode-switcher'); ?></li>
                    <li class="onyx-tab" data-tab="onyx-colors-settings" data-tohide="onyx-tab-content"><?php esc_html_e('Colors', 'onyx-dark-mode-switcher'); ?></li>
                    <li class="onyx-tab" data-tab="onyx-custom-code-settings" data-tohide="onyx-tab-content"><?php esc_html_e('Custom Code', 'onyx-dark-mode-switcher'); ?></li>
                </ul>
            </div>

            <?php
            include ONYX_PATH . 'admin/inc/settings/settings.php';
            include ONYX_PATH . 'admin/inc/settings/switch.php';
            include ONYX_PATH . 'admin/inc/settings/image-video.php';
            include ONYX_PATH . 'admin/inc/settings/colors.php';
            include ONYX_PATH . 'admin/inc/settings/custom-code.php';
            ?>
        </div>

        <div class="onyx-settings-footer onyx-save-settings onyx-settings-btn">
            <button type="submit" class="button button-primary button-large"><i class="mdi-check-circle-outline"></i><?php echo esc_html__('Save Settings', 'onyx-dark-mode-switcher'); ?></button>
        </div>
    </div>
</form>