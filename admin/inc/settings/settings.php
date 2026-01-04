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

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Switch Menu', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Display Switch Button in Menu', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <ul class="onyx-one-column-row">
                    <li class="onyx-settings-list">
                        <div class="onyx-toggle-wrap">
                            <label class="onyx-toggle">
                                <input type="checkbox" name="onyx_settings[switch_in_menu]" <?php checked($onyx_settings['switch_in_menu'], 'on'); ?> data-condition="toggle" id="onyx-display-menu-switch">
                                <span></span>
                            </label>
                        </div>

                        <p class="onyx-desc">
                            <?php esc_html_e('Enables Dark mode switch in menu.', 'onyx-dark-mode-switcher'); ?>
                        </p>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-display-menu-switch">
                        <select name="onyx_settings[switch_menu]">
                            <?php
                            $onyx_menus = wp_get_nav_menus();
                            foreach ($onyx_menus as $onyx_menu) {
                                ?>
                                <option value="<?php echo esc_attr($onyx_menu->term_id); ?>" <?php selected($onyx_settings['switch_menu'], $onyx_menu->term_id); ?>><?php echo esc_html($onyx_menu->name); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p class="onyx-desc">
                            <?php esc_html_e('Select the menu to show the switch button.', 'onyx-dark-mode-switcher'); ?>
                        </p>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-display-menu-switch">
                        <label><?php esc_html_e('Margin', 'onyx-dark-mode-switcher'); ?></label>
                        <ul class="onyx-unit-fields onyx-not-linked">
                            <li class="onyx-unit-settings-field">
                                <input data-unit="px" type="number" name="onyx_settings[menu_switch_margin_top]" value="<?php echo esc_attr($onyx_settings['menu_switch_margin_top']); ?>" min="0">
                                <label><?php esc_html_e('Top', 'onyx-dark-mode-switcher') ?></label>
                            </li>
                            <li class="onyx-unit-settings-field">
                                <input data-unit="px" type="number" name="onyx_settings[menu_switch_margin_right]" value="<?php echo esc_attr($onyx_settings['menu_switch_margin_right']); ?>" min="0">
                                <label><?php esc_html_e('Right', 'onyx-dark-mode-switcher') ?></label>
                            </li>
                            <li class="onyx-unit-settings-field">
                                <input data-unit="px" type="number" name="onyx_settings[menu_switch_margin_bottom]" value="<?php echo esc_attr($onyx_settings['menu_switch_margin_bottom']); ?>" min="0">
                                <label><?php esc_html_e('Bottom', 'onyx-dark-mode-switcher') ?></label>
                            </li>
                            <li class="onyx-unit-settings-field">
                                <input id="onyx-form-border-left" data-unit="px" type="number" name="onyx_settings[menu_switch_margin_left]" value="<?php echo esc_attr($onyx_settings['menu_switch_margin_left']); ?>" min="0">
                                <label><?php esc_html_e('Left', 'onyx-dark-mode-switcher') ?></label>
                            </li>
                            <li class="onyx-unit-settings-field">
                                <div class="onyx-link-button">
                                    <span class="dashicons dashicons-admin-links onyx-linked"></span>
                                    <span class="dashicons dashicons-editor-unlink onyx-unlinked"></span>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-display-menu-switch">
                        <label><?php esc_html_e('Size', 'onyx-dark-mode-switcher'); ?></label>

                        <div class="onyx-settings-input-field">
                            <div class="onyx-range-slider-field">
                                <div class="onyx-range-slider"></div>
                                <input type="number" name="onyx_settings[menu_switch_size]" value="<?php echo esc_attr($onyx_settings['menu_switch_size']); ?>" class="onyx-range-input" min="40" max="100" step="1">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>