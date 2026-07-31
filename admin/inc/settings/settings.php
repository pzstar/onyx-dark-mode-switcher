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
            <label><?php esc_html_e('Scheduled Dark Mode', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_schedule]" <?php checked($onyx_settings['enable_schedule'], 'on'); ?> data-condition="toggle" id="onyx-enable-schedule">
                        <span></span>
                    </label>
                </div>
                <p class="onyx-desc">
                    <?php esc_html_e('Turn dark mode on automatically between two times. Times follow each visitor\'s own clock. A visitor who uses the switch keeps their choice until the next time the window opens or closes.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-enable-schedule">
            <label><?php esc_html_e('Dark Mode Hours', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <ul class="onyx-two-column-row">
                    <li class="onyx-settings-list">
                        <label><?php esc_html_e('From', 'onyx-dark-mode-switcher'); ?></label>
                        <div class="onyx-settings-field">
                            <input type="time" name="onyx_settings[schedule_start]" value="<?php echo esc_attr($onyx_settings['schedule_start']); ?>">
                        </div>
                    </li>
                    <li class="onyx-settings-list">
                        <label><?php esc_html_e('To', 'onyx-dark-mode-switcher'); ?></label>
                        <div class="onyx-settings-field">
                            <input type="time" name="onyx_settings[schedule_end]" value="<?php echo esc_attr($onyx_settings['schedule_end']); ?>">
                        </div>
                    </li>
                </ul>
                <p class="onyx-desc">
                    <?php esc_html_e('A window that ends earlier than it starts runs overnight. For example 20:00 to 06:00.', 'onyx-dark-mode-switcher'); ?>
                </p>
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

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Content Exclusions', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Disable on Post Types', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <?php
                $onyx_disabled_types = (array) $onyx_settings['disabled_post_types'];

                foreach (get_post_types(array('public' => true), 'objects') as $onyx_post_type) {
                    ?>
                    <p>
                        <label>
                            <input type="checkbox" name="onyx_settings[disabled_post_types][]" value="<?php echo esc_attr($onyx_post_type->name); ?>" <?php checked(in_array($onyx_post_type->name, $onyx_disabled_types, true)); ?>>
                            <?php echo esc_html($onyx_post_type->labels->name); ?>
                        </label>
                    </p>
                    <?php
                }
                ?>
                <p class="onyx-desc">
                    <?php esc_html_e('Dark mode never loads on single entries of the checked post types. Archive and listing pages are not affected.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Disable on a Single Page', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <p class="onyx-desc">
                    <?php esc_html_e('Open any post or page and tick "Disable dark mode on this page" in the Onyx Dark Mode box in the sidebar.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>
    </div>
</div>