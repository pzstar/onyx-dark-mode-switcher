<?php

/**
 *
 * Plugin Name:       Onyx Dark Mode Switcher
 * Plugin URI:        https://hashthemes.com/
 * Description:       Dark and Light Theme for your Wordpress website
 * Version:           1.0.0
 * Author:            HashThemes
 * Author URI:        https://hashthemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       onyx-dark-mode-switcher
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

define('ONYX_VERSION', '1.0.0');
define('ONYX_PATH', plugin_dir_path(__FILE__));
define('ONYX_URL', plugin_dir_url(__FILE__));
define('ONYX_BASENAME', plugin_basename(__FILE__));

function onyx_activate() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-onyx-dark-mode-switcher-activator.php';
	Onyx_Dark_Mode_Switcher_Activator::activate();
}

function onyx_deactivate() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-onyx-dark-mode-switcher-deactivator.php';
	Onyx_Dark_Mode_Switcher_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'onyx_activate');
register_deactivation_hook(__FILE__, 'onyx_deactivate');


require plugin_dir_path(__FILE__) . 'includes/class-onyx-dark-mode-switcher.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function onyx_run() {

	$plugin = new Onyx_Dark_Mode_Switcher();
	$plugin->run();

}
onyx_run();
