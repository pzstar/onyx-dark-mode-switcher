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

    $dark_mode_bg = '#101010';
    $dark_mode_secondary_bg = '#1A1A1A';
    $dark_mode_text_color = '#C4C4C4';
    $dark_mode_link_color = '#FFFFFF';
    $dark_mode_link_hover_color = '#D6D6D6';
    $dark_mode_input_bg = '#C4C4C4';
    $dark_mode_input_text_color = '#2A2A2A';
    $dark_mode_input_placeholder_color = '#8E8E8E';
    $dark_mode_border_color = '#444444';
    $dark_mode_btn_text_color = '#2A2A2A';
    $dark_mode_btn_bg = '#C4C4C4';
    $button_offset_top = is_numeric($settings['button_offset_top']) ? $settings['button_offset_top'] : '20';
    $button_offset_left = is_numeric($settings['button_offset_left']) ? $settings['button_offset_left'] : '20';
    $button_offset_bottom = is_numeric($settings['button_offset_bottom']) ? $settings['button_offset_bottom'] : '20';
    $button_offset_right = is_numeric($settings['button_offset_right']) ? $settings['button_offset_right'] : '20';
    $button_size = is_numeric($settings['button_size']) ? $settings['button_size'] : '70';
    $button_icon_size = is_numeric($settings['button_icon_size']) ? $settings['button_icon_size'] : '20';
    $menu_switch_size = is_numeric($settings['menu_switch_size']) ? $settings['menu_switch_size'] : '50';

    if ($settings['preset_style'] == 'style-2') {
        $dark_mode_bg = '#0B1220';
        $dark_mode_secondary_bg = '#131C30';
        $dark_mode_text_color = '#CAD3EA';
        $dark_mode_link_color = '#6CA8FF';
        $dark_mode_link_hover_color = '#98C2FF';
        $dark_mode_input_bg = '#1A2540';
        $dark_mode_input_text_color = '#E8EEFF';
        $dark_mode_input_placeholder_color = '#7F8DB0';
        $dark_mode_border_color = '#2B3A5C';
        $dark_mode_btn_text_color = '#0B1220';
        $dark_mode_btn_bg = '#6CA8FF';
    } elseif ($settings['preset_style'] == 'style-3') {
        $dark_mode_bg = '#121016';
        $dark_mode_secondary_bg = '#1B1823';
        $dark_mode_text_color = '#D7D2E3';
        $dark_mode_link_color = '#B695FF';
        $dark_mode_link_hover_color = '#D1BEFF';
        $dark_mode_input_bg = '#241F2F';
        $dark_mode_input_text_color = '#F2EDFF';
        $dark_mode_input_placeholder_color = '#9088A6';
        $dark_mode_border_color = '#3B3450';
        $dark_mode_btn_text_color = '#121016';
        $dark_mode_btn_bg = '#B695FF';
    } elseif ($settings['preset_style'] == 'style-4') {
        $dark_mode_bg = '#0D1613';
        $dark_mode_secondary_bg = '#16221E';
        $dark_mode_text_color = '#D0E6DF';
        $dark_mode_link_color = '#39D98A';
        $dark_mode_link_hover_color = '#6EE7B7';
        $dark_mode_input_bg = '#1D2B27';
        $dark_mode_input_text_color = '#E9FFF8';
        $dark_mode_input_placeholder_color = '#7FA79B';
        $dark_mode_border_color = '#2F443E';
        $dark_mode_btn_text_color = '#0D1613';
        $dark_mode_btn_bg = '#39D98A';
    } elseif ($settings['preset_style'] == 'style-5') {
        $dark_mode_bg = '#14110E';
        $dark_mode_secondary_bg = '#1D1915';
        $dark_mode_text_color = '#E3D8C6';
        $dark_mode_link_color = '#FFB357';
        $dark_mode_link_hover_color = '#FFD099';
        $dark_mode_input_bg = '#27221D';
        $dark_mode_input_text_color = '#FFF5E6';
        $dark_mode_input_placeholder_color = '#9C8F7D';
        $dark_mode_border_color = '#3B332A';
        $dark_mode_btn_text_color = '#14110E';
        $dark_mode_btn_bg = '#FFB357';
    } elseif ($settings['preset_style'] == 'style-6') {
        $dark_mode_bg = '#071518';
        $dark_mode_secondary_bg = '#0F2126';
        $dark_mode_text_color = '#CBE7EA';
        $dark_mode_link_color = '#33D1C6';
        $dark_mode_link_hover_color = '#7FE7DF';
        $dark_mode_input_bg = '#163136';
        $dark_mode_input_text_color = '#E6FFFF';
        $dark_mode_input_placeholder_color = '#7FA6A9';
        $dark_mode_border_color = '#285055';
        $dark_mode_btn_text_color = '#071518';
        $dark_mode_btn_bg = '#33D1C6';
    } elseif ($settings['preset_style'] == 'style-7') {
        $dark_mode_bg = '#000000';
        $dark_mode_secondary_bg = '#0A0A0A';
        $dark_mode_text_color = '#E5E5E5';
        $dark_mode_link_color = '#FFFFFF';
        $dark_mode_link_hover_color = '#BFBFBF';
        $dark_mode_input_bg = '#141414';
        $dark_mode_input_text_color = '#FFFFFF';
        $dark_mode_input_placeholder_color = '#8A8A8A';
        $dark_mode_border_color = '#262626';
        $dark_mode_btn_text_color = '#000000';
        $dark_mode_btn_bg = '#E5E5E5';
    } elseif ($settings['preset_style'] == 'style-8') {
        $dark_mode_bg = '#151012';
        $dark_mode_secondary_bg = '#1F171A';
        $dark_mode_text_color = '#E2D4D8';
        $dark_mode_link_color = '#FF7A9E';
        $dark_mode_link_hover_color = '#FF9FB8';
        $dark_mode_input_bg = '#2A2024';
        $dark_mode_input_text_color = '#FFF0F4';
        $dark_mode_input_placeholder_color = '#A88992';
        $dark_mode_border_color = '#3C2E33';
        $dark_mode_btn_text_color = '#151012';
        $dark_mode_btn_bg = '#FF7A9E';
    } elseif ($settings['preset_style'] == 'style-9') {
        $dark_mode_bg = '#2B1406';
        $dark_mode_secondary_bg = '#44210B';
        $dark_mode_text_color = '#F5E0D1';
        $dark_mode_link_color = '#FF8A3D';
        $dark_mode_link_hover_color = '#FFB07A';
        $dark_mode_input_bg = '#5C2F13';
        $dark_mode_input_text_color = '#FFF2E8';
        $dark_mode_input_placeholder_color = '#C09A7F';
        $dark_mode_border_color = '#75411D';
        $dark_mode_btn_text_color = '#2B1406';
        $dark_mode_btn_bg = '#FF8A3D';
    } elseif ($settings['preset_style'] == 'style-10') {
        $dark_mode_bg = '#2A0B0B';
        $dark_mode_secondary_bg = '#3F1212';
        $dark_mode_text_color = '#F2D6D6';
        $dark_mode_link_color = '#FF5C5C';
        $dark_mode_link_hover_color = '#FF8A8A';
        $dark_mode_input_bg = '#541919';
        $dark_mode_input_text_color = '#FFF1F1';
        $dark_mode_input_placeholder_color = '#B88C8C';
        $dark_mode_border_color = '#6B2424';
        $dark_mode_btn_text_color = '#2A0B0B';
        $dark_mode_btn_bg = '#FF5C5C';
    } elseif ($settings['preset_style'] == 'style-11') {
        $dark_mode_bg = '#1A0D2E';
        $dark_mode_secondary_bg = '#2A1548';
        $dark_mode_text_color = '#E6DAFF';
        $dark_mode_link_color = '#9F7CFF';
        $dark_mode_link_hover_color = '#C2A8FF';
        $dark_mode_input_bg = '#3A1F63';
        $dark_mode_input_text_color = '#F5EEFF';
        $dark_mode_input_placeholder_color = '#9C8BC7';
        $dark_mode_border_color = '#50308A';
        $dark_mode_btn_text_color = '#1A0D2E';
        $dark_mode_btn_bg = '#9F7CFF';
    } elseif ($settings['preset_style'] == 'style-12') {
        $dark_mode_bg = '#062621';
        $dark_mode_secondary_bg = '#0D3A33';
        $dark_mode_text_color = '#D4F1EA';
        $dark_mode_link_color = '#1ED6B3';
        $dark_mode_link_hover_color = '#5BE7CB';
        $dark_mode_input_bg = '#14524A';
        $dark_mode_input_text_color = '#EFFFFB';
        $dark_mode_input_placeholder_color = '#7FAFA6';
        $dark_mode_border_color = '#1E6A60';
        $dark_mode_btn_text_color = '#062621';
        $dark_mode_btn_bg = '#1ED6B3';
    } elseif ($settings['preset_style'] == 'style-13') {
        $dark_mode_bg = '#2B1406';
        $dark_mode_secondary_bg = '#44210B';
        $dark_mode_text_color = '#F5E0D1';
        $dark_mode_link_color = '#FF8A3D';
        $dark_mode_link_hover_color = '#FFB07A';
        $dark_mode_input_bg = '#5C2F13';
        $dark_mode_input_text_color = '#FFF2E8';
        $dark_mode_input_placeholder_color = '#C09A7F';
        $dark_mode_border_color = '#75411D';
        $dark_mode_btn_text_color = '#2B1406';
        $dark_mode_btn_bg = '#FF8A3D';
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

    if ($settings['switch_bg_color']) {
        $custom_css .= "--onyx-switch-bg-color:{$settings['switch_bg_color']};";
    }

    if ($settings['switch_icon_color']) {
        $custom_css .= "--onyx-switch-icon-color:{$settings['switch_icon_color']};";
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