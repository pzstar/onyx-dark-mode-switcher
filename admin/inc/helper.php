<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * The built in dark mode palettes.
 *
 * Single source of truth: the front end stylesheet generator reads this, and it
 * is also handed to the admin so the Colors tab can preview a palette without
 * saving. Keys line up with the CSS custom properties, which are named
 * --onyx_mode_{key}.
 */
function onyx_preset_palettes() {
    static $palettes = null;

    if ($palettes !== null) {
        return $palettes;
    }

    $palettes = array(
        'style-1' => array('bg' => '#101010', 'secondary_bg' => '#1A1A1A', 'text_color' => '#C4C4C4', 'link_color' => '#FFFFFF', 'link_hover_color' => '#D6D6D6', 'input_bg' => '#C4C4C4', 'input_text_color' => '#2A2A2A', 'input_placeholder_color' => '#8E8E8E', 'border_color' => '#444444', 'btn_text_color' => '#2A2A2A', 'btn_bg' => '#C4C4C4'),
        'style-2' => array('bg' => '#0B1220', 'secondary_bg' => '#131C30', 'text_color' => '#CAD3EA', 'link_color' => '#6CA8FF', 'link_hover_color' => '#98C2FF', 'input_bg' => '#1A2540', 'input_text_color' => '#E8EEFF', 'input_placeholder_color' => '#7F8DB0', 'border_color' => '#2B3A5C', 'btn_text_color' => '#0B1220', 'btn_bg' => '#6CA8FF'),
        'style-3' => array('bg' => '#121016', 'secondary_bg' => '#1B1823', 'text_color' => '#D7D2E3', 'link_color' => '#B695FF', 'link_hover_color' => '#D1BEFF', 'input_bg' => '#241F2F', 'input_text_color' => '#F2EDFF', 'input_placeholder_color' => '#9088A6', 'border_color' => '#3B3450', 'btn_text_color' => '#121016', 'btn_bg' => '#B695FF'),
        'style-4' => array('bg' => '#0D1613', 'secondary_bg' => '#16221E', 'text_color' => '#D0E6DF', 'link_color' => '#39D98A', 'link_hover_color' => '#6EE7B7', 'input_bg' => '#1D2B27', 'input_text_color' => '#E9FFF8', 'input_placeholder_color' => '#7FA79B', 'border_color' => '#2F443E', 'btn_text_color' => '#0D1613', 'btn_bg' => '#39D98A'),
        'style-5' => array('bg' => '#14110E', 'secondary_bg' => '#1D1915', 'text_color' => '#E3D8C6', 'link_color' => '#FFB357', 'link_hover_color' => '#FFD099', 'input_bg' => '#27221D', 'input_text_color' => '#FFF5E6', 'input_placeholder_color' => '#9C8F7D', 'border_color' => '#3B332A', 'btn_text_color' => '#14110E', 'btn_bg' => '#FFB357'),
        'style-6' => array('bg' => '#071518', 'secondary_bg' => '#0F2126', 'text_color' => '#CBE7EA', 'link_color' => '#33D1C6', 'link_hover_color' => '#7FE7DF', 'input_bg' => '#163136', 'input_text_color' => '#E6FFFF', 'input_placeholder_color' => '#7FA6A9', 'border_color' => '#285055', 'btn_text_color' => '#071518', 'btn_bg' => '#33D1C6'),
        'style-7' => array('bg' => '#000000', 'secondary_bg' => '#0A0A0A', 'text_color' => '#E5E5E5', 'link_color' => '#FFFFFF', 'link_hover_color' => '#BFBFBF', 'input_bg' => '#141414', 'input_text_color' => '#FFFFFF', 'input_placeholder_color' => '#8A8A8A', 'border_color' => '#262626', 'btn_text_color' => '#000000', 'btn_bg' => '#E5E5E5'),
        'style-8' => array('bg' => '#151012', 'secondary_bg' => '#1F171A', 'text_color' => '#E2D4D8', 'link_color' => '#FF7A9E', 'link_hover_color' => '#FF9FB8', 'input_bg' => '#2A2024', 'input_text_color' => '#FFF0F4', 'input_placeholder_color' => '#A88992', 'border_color' => '#3C2E33', 'btn_text_color' => '#151012', 'btn_bg' => '#FF7A9E'),
        'style-9' => array('bg' => '#2B1406', 'secondary_bg' => '#44210B', 'text_color' => '#F5E0D1', 'link_color' => '#FF8A3D', 'link_hover_color' => '#FFB07A', 'input_bg' => '#5C2F13', 'input_text_color' => '#FFF2E8', 'input_placeholder_color' => '#C09A7F', 'border_color' => '#75411D', 'btn_text_color' => '#2B1406', 'btn_bg' => '#FF8A3D'),
        'style-10' => array('bg' => '#2A0B0B', 'secondary_bg' => '#3F1212', 'text_color' => '#F2D6D6', 'link_color' => '#FF5C5C', 'link_hover_color' => '#FF8A8A', 'input_bg' => '#541919', 'input_text_color' => '#FFF1F1', 'input_placeholder_color' => '#B88C8C', 'border_color' => '#6B2424', 'btn_text_color' => '#2A0B0B', 'btn_bg' => '#FF5C5C'),
        'style-11' => array('bg' => '#1A0D2E', 'secondary_bg' => '#2A1548', 'text_color' => '#E6DAFF', 'link_color' => '#9F7CFF', 'link_hover_color' => '#C2A8FF', 'input_bg' => '#3A1F63', 'input_text_color' => '#F5EEFF', 'input_placeholder_color' => '#9C8BC7', 'border_color' => '#50308A', 'btn_text_color' => '#1A0D2E', 'btn_bg' => '#9F7CFF'),
        'style-12' => array('bg' => '#062621', 'secondary_bg' => '#0D3A33', 'text_color' => '#D4F1EA', 'link_color' => '#1ED6B3', 'link_hover_color' => '#5BE7CB', 'input_bg' => '#14524A', 'input_text_color' => '#EFFFFB', 'input_placeholder_color' => '#7FAFA6', 'border_color' => '#1E6A60', 'btn_text_color' => '#062621', 'btn_bg' => '#1ED6B3'),
        'style-13' => array('bg' => '#2B1406', 'secondary_bg' => '#44210B', 'text_color' => '#F5E0D1', 'link_color' => '#FF8A3D', 'link_hover_color' => '#FFB07A', 'input_bg' => '#5C2F13', 'input_text_color' => '#FFF2E8', 'input_placeholder_color' => '#C09A7F', 'border_color' => '#75411D', 'btn_text_color' => '#2B1406', 'btn_bg' => '#FF8A3D'),
    );

    // The presets ship no explicit button hover pair. Every palette is built the
    // same way, with link_hover_color as the lighter accent and btn_text_color
    // as the page background, so those carry over cleanly.
    foreach ($palettes as $key => $palette) {
        $palettes[$key]['btn_text_color_hover'] = $palette['btn_text_color'];
        $palettes[$key]['btn_bg_hover'] = $palette['link_hover_color'];
    }

    return $palettes;
}

function onyx_recursive_parse_args($args, $defaults) {
    $new_args = (array) $defaults;
    if ($args) {
        foreach ($args as $key => $value) {
            if (is_array($value) && isset($new_args[$key])) {
                $new_args[$key] = onyx_recursive_parse_args($value, $new_args[$key]);

            } else {
                $new_args[$key] = $value;
            }
        }
    }

    return $new_args;
}

/**
 * Sanitize an array against a matching rule set.
 *
 * A rule is either a callable name (applied to a scalar) or a nested rule array
 * (applied to a nested value array). The key '*' acts as a wildcard for every
 * key at that level, which is how the numerically indexed image lists are
 * covered. Anything without a rule falls back to sanitize_text_field() so no
 * value is ever stored raw.
 */
function onyx_sanitize_array($array = array(), $sanitize_rule = array()) {
    $new_args = array();

    foreach ((array) $array as $key => $value) {
        $rule = '';

        if (is_array($sanitize_rule)) {
            if (isset($sanitize_rule[$key])) {
                $rule = $sanitize_rule[$key];
            } elseif (isset($sanitize_rule['*'])) {
                $rule = $sanitize_rule['*'];
            }
        }

        if (is_array($value)) {
            $new_args[$key] = onyx_sanitize_array($value, is_array($rule) ? $rule : array());

        } elseif (is_string($rule) && $rule !== '' && function_exists($rule)) {
            $new_args[$key] = $rule($value);

        } else {
            $new_args[$key] = sanitize_text_field($value);
        }
    }

    return $new_args;
}

// Sanitize FUnctions
function onyx_sanitize_url($url) {
    $sanitized_url = wp_strip_all_tags(stripslashes(filter_var($url, FILTER_VALIDATE_URL)));
    return $sanitized_url;
}

function onyx_sanitize_checkbox($input) {
    if ($input == 'on') {
        return 'on';
    } else {
        return 'off';
    }
}

function onyx_sanitize_number($input) {
    if (is_numeric($input)) {
        return floatval($input);
    } else {
        return '';
    }
}

/**
 * Sanitize a 24 hour HH:MM time. Returns '' when the value is not a valid time,
 * which the schedule treats as "not configured".
 */
function onyx_sanitize_time($time) {
    $time = trim((string) $time);

    if (!preg_match('/^([01][0-9]|2[0-3]):([0-5][0-9])$/', $time)) {
        return '';
    }

    return $time;
}

/**
 * Sanitize a list of post type slugs down to post types that actually exist.
 */
function onyx_sanitize_post_types($post_types) {
    if (!is_array($post_types)) {
        return array();
    }

    $registered = get_post_types(array('public' => true));

    return array_values(array_intersect(array_map('sanitize_key', $post_types), $registered));
}

/**
 * Sanitize a CSS selector that will be printed into a stylesheet.
 *
 * The selector is interpolated straight into a rule, so anything that could
 * close that rule or open an at-rule has to go. Combinators, attribute
 * selectors and pseudo classes are kept, since those are the whole point.
 */
function onyx_sanitize_css_selector($selector) {
    $selector = wp_strip_all_tags((string) $selector);

    // Sequences that would let a selector escape its own rule block.
    $selector = str_replace(array('{', '}', ';', '@', '\\', '/*', '*/'), '', $selector);

    // Conservative allowlist for whatever survived. ^ $ | are needed for the
    // attribute operators ^= $= |=, and are inert anywhere else in a selector.
    $selector = preg_replace('/[^a-zA-Z0-9\s.#_\-\[\]="\':(),>+~*\^\$\|]/', '', $selector);

    return trim($selector);
}

function onyx_sanitize_color($color) {
    // Is this an rgba color or a hex?
    $mode = (false === strpos($color, 'rgba')) ? 'hex' : 'rgba';
    if ('rgba' === $mode) {
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    } else {
        return sanitize_hex_color($color);
    }
}

function onyx_sanitize_value($sanitize, &$value) {
    if (!empty($sanitize)) {
        if (is_array($value)) {
            $temp_values = $value;
            foreach ($temp_values as $k => $v) {
                $value[$k] = onyx_sanitize_value($sanitize, $value[$k]);
            }
        } else {
            $value = call_user_func($sanitize, htmlspecialchars_decode($value));
        }
    }

    return $value;
}

function onyx_get_var($param, $sanitize = 'sanitize_text_field', $default = '') {
    if (isset($_GET[$param])) {
        $value = wp_unslash($_GET[$param]);
    } else {
        $value = $default;
    }

    return onyx_sanitize_value($sanitize, $value);
}

function onyx_get_post($param, $sanitize = 'sanitize_text_field', $default = '') {
    if (isset($_POST[$param])) {
        $value = wp_unslash($_POST[$param]);
    } else {
        $value = $default;
    }

    return onyx_sanitize_value($sanitize, $value);
}

/**
 * Read a raw, unslashed array off $_POST.
 *
 * Deliberately does not sanitize: the caller runs onyx_sanitize_array() with
 * the matching rule set, so that fields like Custom CSS keep their line breaks
 * until the CSS-aware rule handles them. Nonce and capability are checked by
 * the caller.
 */
function onyx_get_post_data_arr($param) {
    if (!isset($_POST[$param]) || !is_array($_POST[$param])) {
        return [];
    }

    return wp_unslash($_POST[$param]); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
}

function onyx_sanitize_custom_css( $css ) {
    // Strip HTML tags so nothing can break out of the <style> block.
    $css = wp_strip_all_tags( (string) $css );

    // Allow CSS-safe characters only. This has to cover at-rules (@media),
    // combinators (> + ~), attribute selectors and quoted url() values.
    return preg_replace('/[^a-zA-Z0-9\s_:;{},.#()"\'\/%!@\[\]*=~+>&|^$-]/', '', $css);
}

function onyx_sanitize_custom_js( $js ) {
    // Only users with manage_options can save this field, and it is printed
    // inside an inline <script> block. A character allowlist is not workable
    // for JavaScript, so neutralise the one sequence that could break out of
    // that block and leave the rest of the code intact.
    return str_ireplace('</script', '<\/script', (string) $js);
}


function onyx_button_dark_icon_light($icon) {
    switch ($icon) {
        case 'brightnessalthigh':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-high" viewBox="0 0 16 16">
                <path d="M8 3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 3m8 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5m-13.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1zm11.157-6.157a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m-9.9 2.121a.5.5 0 0 0 .707-.707L3.05 5.343a.5.5 0 1 0-.707.707zM8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4m0 1a3 3 0 0 1 2.959 2.5H5.04A3 3 0 0 1 8 8"/>
            </svg>
            <?php
            break;
        case 'brightnessalthighfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-high-fill" viewBox="0 0 16 16">
                <path d="M8 3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 3m8 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5m-13.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1zm11.157-6.157a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m-9.9 2.121a.5.5 0 0 0 .707-.707L3.05 5.343a.5.5 0 1 0-.707.707zM8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4"/>
            </svg>
            <?php
            break;
        case 'brightnesshigh':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <?php
            break;
        case 'brightnesshighfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <?php
            break;
        case 'cloudsun':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-sun" viewBox="0 0 16 16">
                <path d="M7 8a3.5 3.5 0 0 1 3.5 3.555.5.5 0 0 0 .624.492A1.503 1.503 0 0 1 13 13.5a1.5 1.5 0 0 1-1.5 1.5H3a2 2 0 1 1 .1-3.998.5.5 0 0 0 .51-.375A3.5 3.5 0 0 1 7 8m4.473 3a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5z"/>
                <path d="M10.5 1.5a.5.5 0 0 0-1 0v1a.5.5 0 0 0 1 0zm3.743 1.964a.5.5 0 1 0-.707-.707l-.708.707a.5.5 0 0 0 .708.708zm-7.779-.707a.5.5 0 0 0-.707.707l.707.708a.5.5 0 1 0 .708-.708zm1.734 3.374a2 2 0 1 1 3.296 2.198q.3.423.516.898a3 3 0 1 0-4.84-3.225q.529.017 1.028.129m4.484 4.074c.6.215 1.125.59 1.522 1.072a.5.5 0 0 0 .039-.742l-.707-.707a.5.5 0 0 0-.854.377M14.5 6.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
            </svg>
            <?php
            break;
        case 'cloudsunfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-sun-fill" viewBox="0 0 16 16">
                <path d="M11.473 11a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5z"/>
                <path d="M10.5 1.5a.5.5 0 0 0-1 0v1a.5.5 0 0 0 1 0zm3.743 1.964a.5.5 0 1 0-.707-.707l-.708.707a.5.5 0 0 0 .708.708zm-7.779-.707a.5.5 0 0 0-.707.707l.707.708a.5.5 0 1 0 .708-.708zm1.734 3.374a2 2 0 1 1 3.296 2.198q.3.423.516.898a3 3 0 1 0-4.84-3.225q.529.017 1.028.129m4.484 4.074c.6.215 1.125.59 1.522 1.072a.5.5 0 0 0 .039-.742l-.707-.707a.5.5 0 0 0-.854.377M14.5 6.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
            </svg>
            <?php
            break;
        case 'sun':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <?php
            break;
        case 'sunfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(18, 17, 22)" class="bi bi-sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <?php
            break;
        case 'sunrise':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sunrise" viewBox="0 0 16 16">
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l1.5 1.5a.5.5 0 0 1-.708.708L8.5 2.707V4.5a.5.5 0 0 1-1 0V2.707l-.646.647a.5.5 0 1 1-.708-.708zM2.343 4.343a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707m11.314 0a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0M8 7a3 3 0 0 1 2.599 4.5H5.4A3 3 0 0 1 8 7m3.71 4.5a4 4 0 1 0-7.418 0H.499a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
            </svg>
            <?php
            break;
        case 'sunrisefill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sunrise-fill" viewBox="0 0 16 16">
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l1.5 1.5a.5.5 0 0 1-.708.708L8.5 2.707V4.5a.5.5 0 0 1-1 0V2.707l-.646.647a.5.5 0 1 1-.708-.708zM2.343 4.343a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707m11.314 0a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0M11.709 11.5a4 4 0 1 0-7.418 0H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
            </svg>
            <?php
            break;
        case 'lightbulb':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
                <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
            </svg>
            <?php
            break;
        case 'lightbulbfull':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
            </svg>
            <?php
            break;
        default:
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(18, 17, 22)" class="bi bi-sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <?php
            break;
    }
}

function onyx_button_dark_icon_dark($icon) {
    switch($icon) {
        case 'brightnessaltlow':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-low" viewBox="0 0 16 16">
                <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5 6a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1M2 11a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m10.243-3.536a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-8.486-.707a.5.5 0 1 0 .707.707.5.5 0 0 0-.707-.707M8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4m0 1a3 3 0 0 1 2.959 2.5H5.04A3 3 0 0 1 8 8"/>
            </svg>
            <?php
            break;
        case 'brightnessaltlowfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-low-fill" viewBox="0 0 16 16">
                <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5 6a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1M2 11a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m10.243-3.536a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-8.486-.707a.5.5 0 1 0 .707.707.5.5 0 0 0-.707-.707M8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4"/>
            </svg>
            <?php
            break;
        case 'brightnesslow':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
            </svg>
            <?php
            break;
        case 'brightnesslowfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-low-fill" viewBox="0 0 16 16">
                <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8.5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
            </svg>
            <?php
            break;
        case 'cloudmoon':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-moon" viewBox="0 0 16 16">
                <path d="M7 8a3.5 3.5 0 0 1 3.5 3.555.5.5 0 0 0 .625.492A1.503 1.503 0 0 1 13 13.5a1.5 1.5 0 0 1-1.5 1.5H3a2 2 0 1 1 .1-3.998.5.5 0 0 0 .509-.375A3.5 3.5 0 0 1 7 8m4.473 3a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5z"/>
                <path d="M11.286 1.778a.5.5 0 0 0-.565-.755 4.595 4.595 0 0 0-3.18 5.003 5.5 5.5 0 0 1 1.055.209A3.6 3.6 0 0 1 9.83 2.617a4.593 4.593 0 0 0 4.31 5.744 3.58 3.58 0 0 1-2.241.634q.244.477.394 1a4.59 4.59 0 0 0 3.624-2.04.5.5 0 0 0-.565-.755 3.593 3.593 0 0 1-4.065-5.422z"/>
            </svg>
            <?php
            break;
        case 'cloudmoonfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-moon-fill" viewBox="0 0 16 16">
                <path d="M11.473 11a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5z"/>
                <path d="M11.286 1.778a.5.5 0 0 0-.565-.755 4.595 4.595 0 0 0-3.18 5.003 5.5 5.5 0 0 1 1.055.209A3.6 3.6 0 0 1 9.83 2.617a4.593 4.593 0 0 0 4.31 5.744 3.58 3.58 0 0 1-2.241.634q.244.477.394 1a4.59 4.59 0 0 0 3.624-2.04.5.5 0 0 0-.565-.755 3.593 3.593 0 0 1-4.065-5.422z"/>
            </svg>
            <?php
            break;
        case 'moon':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
            </svg>
            <?php
            break;
        case 'moonfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(18, 17, 22)" class="bi bi-moon-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
            </svg>
            <?php
            break;
        case 'sunset':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sunset" viewBox="0 0 16 16">
                <path d="M7.646 4.854a.5.5 0 0 0 .708 0l1.5-1.5a.5.5 0 0 0-.708-.708l-.646.647V1.5a.5.5 0 0 0-1 0v1.793l-.646-.647a.5.5 0 1 0-.708.708zm-5.303-.51a.5.5 0 0 1 .707 0l1.414 1.413a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707zm11.314 0a.5.5 0 0 1 0 .706l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zM8 7a3 3 0 0 1 2.599 4.5H5.4A3 3 0 0 1 8 7m3.71 4.5a4 4 0 1 0-7.418 0H.499a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
            </svg>
            <?php
            break;
        case 'sunsetfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sunset-fill" viewBox="0 0 16 16">
                <path d="M7.646 4.854a.5.5 0 0 0 .708 0l1.5-1.5a.5.5 0 0 0-.708-.708l-.646.647V1.5a.5.5 0 0 0-1 0v1.793l-.646-.647a.5.5 0 1 0-.708.708zm-5.303-.51a.5.5 0 0 1 .707 0l1.414 1.413a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707zm11.314 0a.5.5 0 0 1 0 .706l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zM11.709 11.5a4 4 0 1 0-7.418 0H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
            </svg>
            <?php
            break;
        case 'lightbulboff':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-off" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.23 4.35A6 6 0 0 0 2 6c0 1.691.7 3.22 1.826 4.31.203.196.359.4.453.619l.762 1.769A.5.5 0 0 0 5.5 13a.5.5 0 0 0 0 1 .5.5 0 0 0 0 1l.224.447a1 1 0 0 0 .894.553h2.764a1 1 0 0 0 .894-.553L10.5 15a.5.5 0 0 0 0-1 .5.5 0 0 0 0-1 .5.5 0 0 0 .288-.091L9.878 12H5.83l-.632-1.467a3 3 0 0 0-.676-.941 4.98 4.98 0 0 1-1.455-4.405zm1.588-2.653.708.707a5 5 0 0 1 7.07 7.07l.707.707a6 6 0 0 0-8.484-8.484zm-2.172-.051a.5.5 0 0 1 .708 0l12 12a.5.5 0 0 1-.708.708l-12-12a.5.5 0 0 1 0-.708"/>
            </svg>
            <?php
            break;
        case 'lightbulbofffull':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-off-fill" viewBox="0 0 16 16">
                <path d="M2 6c0-.572.08-1.125.23-1.65l8.558 8.559A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m10.303 4.181L3.818 1.697a6 6 0 0 1 8.484 8.484zM5 14.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5M2.354 1.646a.5.5 0 1 0-.708.708l12 12a.5.5 0 0 0 .708-.708z"/>
            </svg>
            <?php
            break;
        case 'moonstars':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
            </svg>
            <?php
            break;
        case 'moonstarsfill':
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
            </svg>
            <?php
            break;
        default:
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(18, 17, 22)" class="bi bi-moon-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/>
            </svg>
            <?php
            break;
    }
}