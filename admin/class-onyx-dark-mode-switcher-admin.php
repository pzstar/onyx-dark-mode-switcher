<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://hashthemes.com
 * @since      1.0.0
 *
 * @package    Onyx_Dark_Mode_Switcher
 * @subpackage Onyx_Dark_Mode_Switcher/admin
 */

class Onyx_Dark_Mode_Switcher_Admin {

	/**
	 * Hook suffix of the plugin's settings screen, as returned by add_menu_page().
	 */
	const SETTINGS_SCREEN = 'toplevel_page_onyx-settings';

	private $plugin_name;

	private $version;

	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('admin_footer', array($this, 'alert_message'));

		add_filter('plugin_action_links_' . ONYX_BASENAME, array($this, 'add_settings_link'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook = '') {

		if (!$this->is_settings_screen($hook)) {
			return;
		}

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
		wp_enqueue_style('materialdesignicons', ONYX_URL . 'admin/css/materialdesignicons.css', array(), $this->version);
		wp_enqueue_style('wp-color-picker');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook = '') {

		if (!$this->is_settings_screen($hook)) {
			return;
		}

		// CodeMirror Enqueue
		wp_enqueue_code_editor(array('type' => 'text/html'));

		// required to load media uploader
		wp_enqueue_media();

		/* Jquery Condition */
		wp_enqueue_script('jquery-condition', ONYX_URL . 'admin/js/jquery-condition.js', array('jquery'), $this->version, true);

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array('jquery', 'jquery-condition', 'wp-color-picker'), $this->version, false);

		$admin_var = array(
			'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
			'nonce' => wp_create_nonce('onyx_admin_nonce')
		);

		/* Send php values to JS script */
		wp_localize_script($this->plugin_name, 'onyx_admin_obj', $admin_var);

	}

	public function alert_message() {
		if (!$this->is_settings_screen()) {
			return;
		}
		?>
		<div class="onyx-alert">
			<span class="onyx-alert-message"></span>
			<i class="icofont-close-line"></i>
		</div>
		<?php
	}

	/**
	 * Whether the current request is the plugin's own settings screen.
	 *
	 * Falls back to get_current_screen() for hooks that are not handed the
	 * hook suffix, such as admin_footer.
	 */
	private function is_settings_screen($hook = '') {
		if ($hook) {
			return self::SETTINGS_SCREEN === $hook;
		}

		if (!function_exists('get_current_screen')) {
			return false;
		}

		$screen = get_current_screen();
		return $screen && self::SETTINGS_SCREEN === $screen->id;
	}

	public function add_settings_link($links) {
		$settings_link = '<a href="' . get_admin_url(null, 'admin.php?page=onyx-settings') . '">' . esc_html__('Settings', 'onyx-dark-mode-switcher') . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}
}
