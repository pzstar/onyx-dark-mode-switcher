<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * @package Total
 */
/**
 * Resolve the palette for the selected preset.
 *
 * Custom mode falls back to style-1 for any colour the user left blank, so a
 * half filled custom palette can never emit an empty CSS custom property.
 */
function onyx_resolve_palette($settings) {
    $palettes = onyx_preset_palettes();
    $preset = isset($settings['preset_style']) ? $settings['preset_style'] : 'style-1';

    if ($preset !== 'custom') {
        return isset($palettes[$preset]) ? $palettes[$preset] : $palettes['style-1'];
    }

    $custom = array(
        'bg' => $settings['dark_mode_bg'],
        'secondary_bg' => $settings['dark_mode_secondary_bg'],
        'text_color' => $settings['dark_mode_text_color'],
        'link_color' => $settings['dark_mode_link_color'],
        'link_hover_color' => $settings['dark_mode_link_hover_color'],
        'input_bg' => $settings['dark_mode_input_bg'],
        'input_text_color' => $settings['dark_mode_input_text_color'],
        'input_placeholder_color' => $settings['dark_mode_input_placeholder_color'],
        'border_color' => $settings['dark_mode_border_color'],
        'btn_text_color' => $settings['dark_mode_btn_text_color'],
        'btn_bg' => $settings['dark_mode_btn_bg'],
        'btn_text_color_hover' => $settings['dark_mode_btn_text_color_hover'],
        'btn_bg_hover' => $settings['dark_mode_btn_bg_hover'],
    );

    return array_merge($palettes['style-1'], array_filter($custom, 'strlen'));
}

/**
 * Build the per selector overrides declared on the Colors tab.
 *
 * Emitted after the :root block so they land later in the cascade than the
 * generic .onyx-change-* rules in public.css and therefore win.
 */
function onyx_color_override_styles($settings) {
    if (empty($settings['color_overrides']) || !is_array($settings['color_overrides'])) {
        return '';
    }

    $css = '';

    foreach ($settings['color_overrides'] as $override) {
        if (!is_array($override)) {
            continue;
        }

        $selector = isset($override['selector']) ? trim($override['selector']) : '';
        if ($selector === '') {
            continue;
        }

        $declarations = '';
        $map = array(
            'bg' => 'background-color',
            'text' => 'color',
            'border' => 'border-color',
        );

        foreach ($map as $key => $property) {
            if (!empty($override[$key])) {
                $declarations .= "{$property}:{$override[$key]} !important;";
            }
        }

        if ($declarations === '') {
            continue;
        }

        $css .= ".onyx-dark-mode {$selector}{{$declarations}}";
    }

    return $css;
}

function onyx_dymanic_styles($settings) {
    $custom_css = "";

    $palette = onyx_resolve_palette($settings);
    $button_offset_top = is_numeric($settings['button_offset_top']) ? $settings['button_offset_top'] : '20';
    $button_offset_left = is_numeric($settings['button_offset_left']) ? $settings['button_offset_left'] : '20';
    $button_offset_bottom = is_numeric($settings['button_offset_bottom']) ? $settings['button_offset_bottom'] : '20';
    $button_offset_right = is_numeric($settings['button_offset_right']) ? $settings['button_offset_right'] : '20';
    $button_size = is_numeric($settings['button_size']) ? $settings['button_size'] : '70';
    $button_icon_size = is_numeric($settings['button_icon_size']) ? $settings['button_icon_size'] : '20';
    $menu_switch_size = is_numeric($settings['menu_switch_size']) ? $settings['menu_switch_size'] : '50';

    $custom_css .= ":root {";
    foreach ($palette as $onyx_key => $onyx_value) {
        $custom_css .= "--onyx_mode_{$onyx_key}: {$onyx_value};";
    }

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

    $custom_css .= onyx_color_override_styles($settings);

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