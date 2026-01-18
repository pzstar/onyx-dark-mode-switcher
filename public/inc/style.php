<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * @package Total
 */
function onyx_dymanic_styles($settings) {
    $custom_css = "";

    $dark_mode_bg = '#0F0F0F';
    $dark_mode_secondary_bg = '#171717';
    $dark_mode_text_color = '#BEBEBE';
    $dark_mode_link_color = '#FFFFFF';
    $dark_mode_link_hover_color = '#CCCCCC';
    $dark_mode_input_bg = '#BEBEBE';
    $dark_mode_input_text_color = '#2D2D2D';
    $dark_mode_input_placeholder_color = '#989898';
    $dark_mode_border_color = '#4A4A4A';
    $dark_mode_btn_text_color = '#2D2D2D';
    $dark_mode_btn_bg = '#BEBEBE';
    $button_offset_top = is_numeric($settings['button_offset_top']) ? $settings['button_offset_top'] : '20';
    $button_offset_left = is_numeric($settings['button_offset_left']) ? $settings['button_offset_left'] : '20';
    $button_offset_bottom = is_numeric($settings['button_offset_bottom']) ? $settings['button_offset_bottom'] : '20';
    $button_offset_right = is_numeric($settings['button_offset_right']) ? $settings['button_offset_right'] : '20';
    $button_size = is_numeric($settings['button_size']) ? $settings['button_size'] : '70';
    $button_icon_size = is_numeric($settings['button_icon_size']) ? $settings['button_icon_size'] : '20';
    $menu_switch_size = is_numeric($settings['menu_switch_size']) ? $settings['menu_switch_size'] : '50';

    if ($settings['preset_style'] == 'style-2') {
        $dark_mode_bg = '#092635';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#1B4242';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#1B4242';
        $dark_mode_input_text_color = '#5C8374';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#9EC8B9';
        $dark_mode_btn_text_color = '#5C8374';
        $dark_mode_btn_bg = '#1B4242';
    } elseif ($settings['preset_style'] == 'style-3') {
        $dark_mode_bg = '#363062';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#435585';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#435585';
        $dark_mode_input_text_color = '#818FB4';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#F5E8C7';
        $dark_mode_btn_text_color = '#818FB4';
        $dark_mode_btn_bg = '#435585';
    } elseif ($settings['preset_style'] == 'style-4') {
        $dark_mode_bg = '#22092C';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#435585';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#435585';
        $dark_mode_input_text_color = '#818FB4';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#F5E8C7';
        $dark_mode_btn_text_color = '#818FB4';
        $dark_mode_btn_bg = '#435585';
    } elseif ($settings['preset_style'] == 'style-5') {
        $dark_mode_bg = '#352F44';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#5C5470';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#5C5470';
        $dark_mode_input_text_color = '#B9B4C7';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#FAF0E6';
        $dark_mode_btn_text_color = '#B9B4C7';
        $dark_mode_btn_bg = '#5C5470';
    } elseif ($settings['preset_style'] == 'style-6') {
        $dark_mode_bg = '#082032';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#2C394B';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#2C394B';
        $dark_mode_input_text_color = '#334756';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#FF4C29';
        $dark_mode_btn_text_color = '#334756';
        $dark_mode_btn_bg = '#2C394B';
    } elseif ($settings['preset_style'] == 'style-7') {
        $dark_mode_bg = '#1D2D50';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#133B5C';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#133B5C';
        $dark_mode_input_text_color = '#1E5F74';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#FCDAB7';
        $dark_mode_btn_text_color = '#1E5F74';
        $dark_mode_btn_bg = '#133B5C';
    } elseif ($settings['preset_style'] == 'style-8') {
        $dark_mode_bg = '#142850';
        $dark_mode_secondary_bg = '#171717';
        $dark_mode_text_color = '#27496D';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#CCCCCC';
        $dark_mode_input_bg = '#27496D';
        $dark_mode_input_text_color = '#0C7B93';
        $dark_mode_input_placeholder_color = '#989898';
        $dark_mode_border_color = '#00A8CC';
        $dark_mode_btn_text_color = '#0C7B93';
        $dark_mode_btn_bg = '#27496D';
    } elseif ($settings['preset_style'] == 'custom') {
        $dark_mode_bg = $settings['dark_mode_bg'];
        $dark_mode_secondary_bg = $settings['dark_mode_secondary_bg'];
        $dark_mode_text_color = $settings['dark_mode_text_color'];
        $dark_mode_link_color = $settings['dark_mode_link_color'];
        $dark_mode_link_hover_color = $settings['dark_mode_link_hover_color'];
        $dark_mode_input_bg = $settings['dark_mode_input_bg'];
        $dark_mode_input_text_color = $settings['dark_mode_input_text_color'];
        $dark_mode_input_placeholder_color = $settings['dark_mode_input_placeholder_color'];
        $dark_mode_border_color = $settings['dark_mode_border_color'];
        $dark_mode_btn_text_color = $settings['dark_mode_btn_text_color'];
        $dark_mode_btn_bg = $settings['dark_mode_btn_bg'];
    }

    $custom_css .= ":root {";
    $custom_css .= "--onyx_mode_bg: {$dark_mode_bg};";
    $custom_css .= "--onyx_mode_secondary_bg: {$dark_mode_secondary_bg};";
    $custom_css .= "--onyx_mode_text_color: {$dark_mode_text_color};";
    $custom_css .= "--onyx_mode_link_color: {$dark_mode_link_color};";
    $custom_css .= "--onyx_mode_link_hover_color: {$dark_mode_link_hover_color};";
    $custom_css .= "--onyx_mode_input_bg: {$dark_mode_input_bg};";
    $custom_css .= "--onyx_mode_input_text_color: {$dark_mode_input_text_color};";
    $custom_css .= "--onyx_mode_input_placeholder_color: {$dark_mode_input_placeholder_color};";
    $custom_css .= "--onyx_mode_border_color: {$dark_mode_border_color};";
    $custom_css .= "--onyx_mode_btn_text_color: {$dark_mode_btn_text_color};";
    $custom_css .= "--onyx_mode_btn_bg: {$dark_mode_btn_bg};";

    $custom_css .= "--onyx-offset-top: {$button_offset_top}px;";
    $custom_css .= "--onyx-offset-bottom: {$button_offset_bottom}px;";
    $custom_css .= "--onyx-offset-left: {$button_offset_left}px;";
    $custom_css .= "--onyx-offset-right: {$button_offset_right}px;";
    $custom_css .= "--onyx-trigger-btn-size: {$button_size}px;";
    $custom_css .= "--onyx-trigger-icon-size: {$button_icon_size}px;";
    $custom_css .= "--onyx-menu-switch-size: {$menu_switch_size}px;";

    if (is_numeric($settings['menu_switch_margin_top'])) {
        $custom_css .= "--onyx-menu-switch-margin-top:{$settings['menu_switch_margin_top']}px;";
    }

    if (is_numeric($settings['menu_switch_margin_bottom'])) {
        $custom_css .= "--onyx-menu-switch-margin-bottom:{$settings['menu_switch_margin_bottom']}px;";
    }

    if (is_numeric($settings['menu_switch_margin_left'])) {
        $custom_css .= "--onyx-menu-switch-margin-left:{$settings['menu_switch_margin_left']}px;";
    }

    if (is_numeric($settings['menu_switch_margin_right'])) {
        $custom_css .= "--onyx-menu-switch-margin-right:{$settings['menu_switch_margin_right']}px;";
    }

    if (is_numeric($settings['button_shadow_x'])) {
        $custom_css .= "--onyx-trigger-btn-shadow-x:{$settings['button_shadow_x']}px;";
    }

    if (is_numeric($settings['button_shadow_y'])) {
        $custom_css .= "--onyx-trigger-btn-shadow-y:{$settings['button_shadow_y']}px;";
    }

    if (is_numeric($settings['button_shadow_blur'])) {
        $custom_css .= "--onyx-trigger-btn-shadow-blur:{$settings['button_shadow_blur']}px;";
    }

    if ($settings['button_shadow_color']) {
        $custom_css .= "--onyx-trigger-btn-shadow-color:{$settings['button_shadow_color']};";
    }

    if ($settings['button_bg_color']) {
        $custom_css .= "--onyx-trigger-btn-bg-color:{$settings['button_bg_color']};";
    }

    if ($settings['dark_mode_button_bg']) {
        $custom_css .= "--onyx-trigger-btn-bg-dark-color:{$settings['dark_mode_button_bg']};";
    }

    if ($settings['button_icon_color']) {
        $custom_css .= "--onyx-trigger-btn-icon-color:{$settings['button_icon_color']};";
    }

    if ($settings['dark_mode_button_icon_color']) {
        $custom_css .= "--onyx-trigger-btn-icon-dark-color:{$settings['dark_mode_button_icon_color']};";
    }

    $custom_css .= "}";

    return onyx_css_strip_whitespace($custom_css);
}

if (!function_exists('onyx_css_strip_whitespace')) {

    function onyx_css_strip_whitespace($css) {
        $replace = array(
            "#/\*.*?\*/#s" => "", // Strip C style comments.
            "#\s\s+#" => " ", // Strip excess whitespace.
        );
        $search = array_keys($replace);
        $css = preg_replace($search, $replace, $css);

        $replace = array(
            ": " => ":",
            "; " => ";",
            " {" => "{",
            " }" => "}",
            ", " => ",",
            "{ " => "{",
            ";}" => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            //"} " => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys($replace);
        $css = str_replace($search, $replace, $css);

        return trim($css);
    }

}