<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$onyx_button_light_icons = array('brightnessalthigh', 'brightnessalthighfill', 'brightnesshigh', 'brightnesshighfill', 'cloudsun', 'cloudsunfill', 'sun', 'sunfill', 'sunrise', 'sunrisefill', 'lightbulb', 'lightbulbfull');
$onyx_button_dark_icons = array('brightnessaltlow', 'brightnessaltlowfill', 'brightnesslow', 'brightnesslowfill', 'cloudmoon', 'cloudmoonfill', 'moon', 'moonfill', 'sunset', 'sunsetfill', 'lightbulboff', 'lightbulbofffull', 'moonstars', 'moonstarsfill');

?>

<div class="onyx-options-fields-wrap onyx-tab-content onyx-switch-settings-content" id="onyx-switch-settings" style="display: none;">
    <div class="onyx-field-column">
        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Display Switch Button', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_button]" <?php checked($onyx_settings['enable_button'], 'on'); ?> id="onyx-offcanvas-btn" data-condition="toggle">
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Switch Icon', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-icon-pick-wrap">
                    <label class="onyx-icon-title"><?php esc_html_e('Light Icon', 'onyx-dark-mode-switcher'); ?></label>

                    <div class="onyx-icon-grid">
                        <?php
                        foreach ($onyx_button_light_icons as $onyx_icon) {
                            ?>
                            <button class="onyx-icon-btn" aria-pressed="<?php echo esc_attr($onyx_settings['button_light_icon'] == $onyx_icon ? 'true' : 'false'); ?>" data-name="<?php echo esc_attr($onyx_icon) ?>">
                                <?php onyx_button_dark_icon_light($onyx_icon); ?>
                            </button>
                            <?php
                        }
                        ?>
                    </div>

                    <input type="hidden" name="onyx_settings[button_light_icon]" class="onyx-icon" value="<?php echo esc_attr($onyx_settings['button_light_icon']); ?>" />
                </div>
                <p></p>
                <div class="onyx-icon-pick-wrap">
                    <label class="onyx-icon-title"><?php esc_html_e('Dark Icon', 'onyx-dark-mode-switcher'); ?></label>

                    <div class="onyx-icon-grid">
                        <?php
                        foreach ($onyx_button_dark_icons as $onyx_icon) {
                            ?>
                            <button class="onyx-icon-btn" aria-pressed="<?php echo esc_attr($onyx_settings['button_dark_icon'] == $onyx_icon ? 'true' : 'false'); ?>" data-name="<?php echo esc_attr($onyx_icon) ?>">
                                <?php onyx_button_dark_icon_dark($onyx_icon); ?>
                            </button>
                            <?php
                        }
                        ?>
                    </div>
                    <input type="hidden" name="onyx_settings[button_dark_icon]" class="onyx-icon" value="<?php echo esc_attr($onyx_settings['button_dark_icon']); ?>" />
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Button Shape', 'onyx-dark-mode-switcher'); ?></label>

            <div class="onyx-settings-field">
                <select name="onyx_settings[button_shape]">
                    <option value="square" <?php selected($onyx_settings['button_shape'], 'square'); ?>><?php esc_html_e('Square', 'onyx-dark-mode-switcher'); ?></option>
                    <option value="round" <?php selected($onyx_settings['button_shape'], 'round'); ?>><?php esc_html_e('Round', 'onyx-dark-mode-switcher'); ?></option>
                    <option value="rounded-square" <?php selected($onyx_settings['button_shape'], 'rounded-square'); ?>><?php esc_html_e('Rounded Square', 'onyx-dark-mode-switcher'); ?></option>
                    <option value="blob" <?php selected($onyx_settings['button_shape'], 'blob'); ?>><?php esc_html_e('Animating Blob', 'onyx-dark-mode-switcher'); ?></option>
                </select>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Button Position', 'onyx-dark-mode-switcher'); ?></label>

            <div class="onyx-settings-field">
                <select name="onyx_settings[button_position]" data-condition="toggle" id="onyx-offcanvas-btn-position">
                    <option value="top-left" <?php selected($onyx_settings['button_position'], 'top-left'); ?>><?php esc_html_e('Top Left', 'onyx-dark-mode-switcher') ?></option>
                    <option value="top-middle" <?php selected($onyx_settings['button_position'], 'top-middle'); ?>><?php esc_html_e('Top Middle', 'onyx-dark-mode-switcher') ?></option>
                    <option value="top-right" <?php selected($onyx_settings['button_position'], 'top-right'); ?>><?php esc_html_e('Top Right', 'onyx-dark-mode-switcher') ?></option>
                    <option value="bottom-left" <?php selected($onyx_settings['button_position'], 'bottom-left'); ?>><?php esc_html_e('Bottom Left', 'onyx-dark-mode-switcher') ?></option>
                    <option value="bottom-middle" <?php selected($onyx_settings['button_position'], 'bottom-middle'); ?>><?php esc_html_e('Bottom Middle', 'onyx-dark-mode-switcher') ?></option>
                    <option value="bottom-right" <?php selected($onyx_settings['button_position'], 'bottom-right'); ?>><?php esc_html_e('Bottom Right', 'onyx-dark-mode-switcher') ?></option>
                    <option value="middle-left" <?php selected($onyx_settings['button_position'], 'middle-left'); ?>><?php esc_html_e('Middle Left', 'onyx-dark-mode-switcher') ?></option>
                    <option value="middle-right" <?php selected($onyx_settings['button_position'], 'middle-right'); ?>><?php esc_html_e('Middle Right', 'onyx-dark-mode-switcher') ?></option>
                </select>

                <p></p>

                <ul class="onyx-two-column-row">
                    <li class="onyx-settings-list" data-condition-toggle="onyx-offcanvas-btn-position" data-condition-val="top-left,top-middle,top-right">
                        <label><?php esc_html_e('Offset from Top (px)', 'onyx-dark-mode-switcher') ?></label>
                        <div class="onyx-settings-field">
                            <input type="number" name="onyx_settings[button_offset_top]" value="<?php echo esc_attr($onyx_settings['button_offset_top']); ?>">
                        </div>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-offcanvas-btn-position" data-condition-val="bottom-left,bottom-middle,bottom-right">
                        <label><?php esc_html_e('Offset from Bottom (px)', 'onyx-dark-mode-switcher') ?></label>
                        <div class="onyx-settings-field">
                            <input type="number" name="onyx_settings[button_offset_bottom]" value="<?php echo esc_attr($onyx_settings['button_offset_bottom']); ?>">
                        </div>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-offcanvas-btn-position" data-condition-val="top-left,middle-left,bottom-left">
                        <label><?php esc_html_e('Offset from Left (px)', 'onyx-dark-mode-switcher') ?></label>
                        <div class="onyx-settings-field">
                            <input type="number" name="onyx_settings[button_offset_left]" value="<?php echo esc_attr($onyx_settings['button_offset_left']); ?>">
                        </div>
                    </li>

                    <li class="onyx-settings-list" data-condition-toggle="onyx-offcanvas-btn-position" data-condition-val="top-right,middle-right,bottom-right">
                        <label><?php esc_html_e('Offset from Right (px)', 'onyx-dark-mode-switcher') ?></label>
                        <div class="onyx-settings-field">
                            <input type="number" name="onyx_settings[button_offset_right]" value="<?php echo esc_attr($onyx_settings['button_offset_right']); ?>">
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Button Size', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <input type="number" name="onyx_settings[button_size]" value="<?php echo esc_attr($onyx_settings['button_size']); ?>"> px
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Icon Size', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <input type="number" name="onyx_settings[button_icon_size]" value="<?php echo esc_attr($onyx_settings['button_icon_size']); ?>"> px
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Button (Normal Mode)', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-two-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[button_bg_color]" value="<?php echo esc_attr($onyx_settings['button_bg_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Icon Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[button_icon_color]" value="<?php echo esc_attr($onyx_settings['button_icon_color']); ?>">
                    </div>
                </li>
            </ul>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Button (Dark Mode)', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-two-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_button_bg]" value="<?php echo esc_attr($onyx_settings['dark_mode_button_bg']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Icon Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[dark_mode_button_icon_color]" value="<?php echo esc_attr($onyx_settings['dark_mode_button_icon_color']); ?>">
                    </div>
                </li>
            </ul>

        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Shadow', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-shadow-fields">
                <li class="onyx-shadow-settings-field">
                    <input type="number" name="onyx_settings[button_shadow_x]" value="<?php echo esc_attr($onyx_settings['button_shadow_x']); ?>">
                    <label><?php esc_html_e('H', 'onyx-dark-mode-switcher'); ?></label>
                </li>

                <li class="onyx-shadow-settings-field">
                    <input type="number" name="onyx_settings[button_shadow_y]" value="<?php echo esc_attr($onyx_settings['button_shadow_y']); ?>">
                    <label><?php esc_html_e('V', 'onyx-dark-mode-switcher'); ?></label>
                </li>

                <li class="onyx-shadow-settings-field">
                    <input type="number" name="onyx_settings[button_shadow_blur]" value="<?php echo esc_attr($onyx_settings['button_shadow_blur']); ?>">
                    <label><?php esc_html_e('Blur', 'onyx-dark-mode-switcher'); ?></label>
                </li>

                <li class="onyx-shadow-settings-field">
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[button_shadow_color]" value="<?php echo esc_attr($onyx_settings['button_shadow_color']); ?>">
                    </div>
                </li>
            </ul>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <h3><?php esc_html_e('Tool Tip', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Enable Tool Tip', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[enable_tooltip]" <?php checked($onyx_settings['enable_tooltip'], 'on'); ?>>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-offcanvas-btn">
            <label><?php esc_html_e('Tool Tip Text', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <input type="text" name="onyx_settings[tooltip_text]" value="<?php echo esc_attr($onyx_settings['tooltip_text']); ?>">
            </div>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Switch Menu', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Display Switch Button in Menu', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <div class="onyx-toggle-wrap">
                    <label class="onyx-toggle">
                        <input type="checkbox" name="onyx_settings[switch_in_menu]" <?php checked($onyx_settings['switch_in_menu'], 'on'); ?> data-condition="toggle" id="onyx-display-menu-switch">
                        <span></span>
                    </label>
                </div>

                <p class="onyx-desc">
                    <?php esc_html_e('Enables Dark mode switch in menu.', 'onyx-dark-mode-switcher'); ?>
                </p>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-display-menu-switch">
            <label><?php esc_html_e('Select Menu', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
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
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-display-menu-switch">
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
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-display-menu-switch">
            <label><?php esc_html_e('Size', 'onyx-dark-mode-switcher'); ?></label>

            <div class="onyx-settings-input-field">
                <div class="onyx-range-slider-field">
                    <div class="onyx-range-slider"></div>
                    <input type="number" name="onyx_settings[menu_switch_size]" value="<?php echo esc_attr($onyx_settings['menu_switch_size']); ?>" class="onyx-range-input" min="40" max="100" step="1">
                </div>
            </div>
        </div>

        <div class="onyx-field-wrap" data-condition-toggle="onyx-display-menu-switch">
            <label><?php esc_html_e('Switch Color', 'onyx-dark-mode-switcher'); ?></label>
            <ul class="onyx-two-column-row">
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Background Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[switch_bg_color]" value="<?php echo esc_attr($onyx_settings['switch_bg_color']); ?>">
                    </div>
                </li>
                <li class="onyx-settings-list">
                    <label><?php esc_html_e('Icon Color', 'onyx-dark-mode-switcher'); ?></label>
                    <div class="onyx-settings-field onyx-color-input-field">
                        <input type="text" data-alpha-enabled="true" data-alpha-custom-width="30px" data-alpha-color-type="hex" class="color-picker onyx-color-picker" name="onyx_settings[switch_icon_color]" value="<?php echo esc_attr($onyx_settings['switch_icon_color']); ?>">
                    </div>
                </li>
            </ul>
        </div>

        <div class="onyx-field-wrap">
            <h3><?php esc_html_e('Custom Switch', 'onyx-dark-mode-switcher'); ?></h3>
        </div>

        <div class="onyx-field-wrap">
            <label><?php esc_html_e('Use Custom Switch Button', 'onyx-dark-mode-switcher'); ?></label>
            <div class="onyx-settings-field">
                <input type="text" name="onyx_settings[switch_selector]" value="<?php echo esc_attr($onyx_settings['switch_selector']); ?>">
                <p class="onyx-desc"><?php esc_html_e('Enter HTML tags, CSS class or CSS ids. Eg #mast-head, .container, footer', 'onyx-dark-mode-switcher'); ?></p>
            </div>
        </div>
    </div>
</div>