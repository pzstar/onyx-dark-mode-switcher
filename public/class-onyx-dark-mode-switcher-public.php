<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 *
 * @link       https://hashthemes.com
 * @since      1.0.0
 *
 * @package    Onyx_Dark_Mode_Switcher
 * @subpackage Onyx_Dark_Mode_Switcher/public
 */

class Onyx_Dark_Mode_Switcher_Public {

	private $plugin_name;

	private $version;

	public $dark_mode_settings = [];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {
		$this->dark_mode_settings = Onyx_Dark_Mode_Switcher_Settings::get_settings();

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		if ($this->dark_mode_settings['enable'] == 'on') {
			$this->include_files();

			if ($this->dark_mode_settings['enable_button'] == 'on') {
				add_action('wp_footer', array($this, 'toggle_button'));
			}

			if ($this->dark_mode_settings['switch_in_menu'] == 'on') {
				add_filter('wp_nav_menu_items', array($this, 'menu_switch'), 10, 2);
			}
		}
	}

	public function include_files() {
		include ONYX_PATH . 'public/inc/style.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ($this->dark_mode_settings['enable'] == 'on') {
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/public.css', array(), $this->version, 'all');

			wp_add_inline_style($this->plugin_name, onyx_dymanic_styles($this->dark_mode_settings));
		}

		if (isset($this->dark_mode_settings['custom_css']) && trim($this->dark_mode_settings['custom_css'])) {
			wp_add_inline_style($this->plugin_name, onyx_css_strip_whitespace($this->dark_mode_settings['custom_css']));
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ($this->dark_mode_settings['enable'] == 'on') {
			$replace_images_array = array_filter($this->dark_mode_settings['replace_images'], function ($item) {
				return trim($item['org_image']) !== '' || trim($item['dark_image']) !== '';
			});

			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public.js', array('jquery'), $this->version, false);
			wp_localize_script($this->plugin_name, 'onyx_obj', array(
				'image_replacements_arr' => $replace_images_array,
				'invert_images_arr' => array_filter($this->dark_mode_settings['invert_images']),
				'enable_default_dark_mode' => $this->dark_mode_settings['enable_default_dark_mode'],
				'enable_keyboard_shortcode' => $this->dark_mode_settings['enable_keyboard_shortcode'],
				'enable_image_grayscale' => $this->dark_mode_settings['enable_image_grayscale'],
				'enable_video_grayscale' => $this->dark_mode_settings['enable_video_grayscale'],
				'darken_background_images' => $this->dark_mode_settings['darken_background_images'],
				'darken_level' => $this->dark_mode_settings['darken_level'],
				'invert_svg' => $this->dark_mode_settings['invert_svg'],
				'disallowed_elements' => $this->dark_mode_settings['disallowed_elements'],
				'allowed_button_classes' => $this->dark_mode_settings['allowed_button_classes'],
				'switch_selector' => $this->dark_mode_settings['switch_selector'],
			));
		}

		$before_trigger = isset($this->dark_mode_settings['before_js']) && !empty($this->dark_mode_settings['before_js']) ? $this->dark_mode_settings['before_js'] : null;
		$after_trigger = isset($this->dark_mode_settings['after_js']) && !empty($this->dark_mode_settings['after_js']) ? $this->dark_mode_settings['after_js'] : null;

		if (!empty($before_trigger)) {
			wp_add_inline_script($this->plugin_name, ' jQuery(document).bind("onyx_before_toggle", function (event, response) {' . wp_kses_post($before_trigger) . '});');
		}
		if (!empty($after_trigger)) {
			wp_add_inline_script($this->plugin_name, 'jQuery(document).bind("onyx_after_toggle", function (event, response) {' . wp_kses_post($after_trigger) . '});');
		}

	}

	public function toggle_button() {
		$position = $this->dark_mode_settings['button_position'];
		$shape = $this->dark_mode_settings['button_shape'];
		?>
		<div class="onyx-switch-trigger-block onyx-position-<?php echo esc_attr($position); ?> onyx-shape-<?php echo esc_attr($shape); ?>">
			<div class="onyx-toggle-button">
				<?php
				onyx_button_dark_icon_light($this->dark_mode_settings['button_light_icon']);
				onyx_button_dark_icon_dark($this->dark_mode_settings['button_dark_icon']);
				if ($this->dark_mode_settings['enable_tooltip'] == 'on') {
					echo '<span class="onyx-trigger-tooltip">';
					echo esc_html($this->dark_mode_settings['tooltip_text']);
					echo '</span>';
				}
				?>
			</div>
		</div>
		<?php
	}

	public function menu_switch($items, $args) {
		if (isset($args->menu->term_id)) {
			if ($args->menu->term_id == $this->dark_mode_settings['switch_menu']) {
				$items .= '<li class="menu-item onyx-menu-item">';
				$items .= '<a class="onyx-toggle-menu" href="javascript:void(0)">';
				ob_start();
				onyx_button_dark_icon_light($this->dark_mode_settings['button_light_icon']);
				onyx_button_dark_icon_dark($this->dark_mode_settings['button_dark_icon']);
				$items .= ob_get_clean();
				$items .= '<em></em>';
				$items .= '</a>';
				$items .= '</li>';
			}
		}
		return $items;
	}

}
