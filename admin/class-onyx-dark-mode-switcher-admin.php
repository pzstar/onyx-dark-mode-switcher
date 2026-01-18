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

	private $plugin_name;

	private $version;

	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->include_files();

		add_action('admin_footer', array($this, 'alert_message'));

		add_filter('plugin_action_links_' . ONYX_BASENAME, array($this, 'add_settings_link'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
		wp_enqueue_style('materialdesignicons', ONYX_URL . 'admin/css/materialdesignicons.css', array(), $this->version);
		wp_enqueue_style('wp-color-picker');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// CodeMirror Enqueue
		$this->enable_syntax_highlighting_for_current_user();
		wp_enqueue_code_editor(array('type' => 'text/html'));

		// required to load media uploader
		wp_enqueue_media(); 

		/* Jquery Condition */
		wp_enqueue_script('jquery-condition', ONYX_URL . 'admin/js/jquery-condition.js', array('jquery'), $this->version, true);
		
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array('jquery', 'jquery-condition', 'wp-color-picker'), $this->version, false);

		$admin_var = array(
			'ajaxurl' => esc_url(admin_url('admin-ajax.php'))
		);

		/* Send php values to JS script */
		wp_localize_script($this->plugin_name, 'onyx_admin_obj', $admin_var);

	}

	public function include_files() {
		include ONYX_PATH . 'admin/inc/helper.php';
		include ONYX_PATH . 'admin/inc/class-onyx-dark-mode-switcher-settings.php';
	}

	public function alert_message() {
		?>
		<div class="onyx-alert">
			<span class="onyx-alert-message"></span>
			<i class="icofont-close-line"></i>
		</div>
		<?php
	}

	public function enable_syntax_highlighting_for_current_user() {
		if (is_user_logged_in()) {
			$user_id = get_current_user_id();
			update_user_meta($user_id, 'syntax_highlighting', 'true');
		}
	}

	public function add_settings_link($links) {
		$settings_link = '<a href="' . get_admin_url(null, 'admin.php?page=onyx-settings') . '">' . esc_html__('Settings', 'onyx-dark-mode-switcher') . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}
}
