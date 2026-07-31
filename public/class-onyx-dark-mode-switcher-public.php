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
	 * Memoised result of is_disabled_for_request(). Null until first resolved.
	 */
	private $disabled_for_request = null;

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

			// Priority 0: this has to run before the stylesheet and before
			// jQuery, so the dark class is on <html> ahead of first paint.
			add_action('wp_head', array($this, 'print_initial_mode_script'), 0);

			if ($this->dark_mode_settings['enable_button'] == 'on') {
				add_action('wp_footer', array($this, 'toggle_button'));
			}

			if ($this->dark_mode_settings['switch_in_menu'] == 'on') {
				add_filter('wp_nav_menu_items', array($this, 'menu_switch'), 10, 2);
			}
		}
	}

	/**
	 * Whether dark mode is switched off for the page currently being rendered.
	 *
	 * Two ways to opt out: the post type is excluded in the settings, or the
	 * individual entry has the per page checkbox ticked.
	 */
	public function is_disabled_for_request() {
		if ($this->disabled_for_request !== null) {
			return $this->disabled_for_request;
		}

		$this->disabled_for_request = false;

		if (is_singular()) {
			$post_id = get_queried_object_id();
			$disabled_types = (array) $this->dark_mode_settings['disabled_post_types'];

			if ($post_id && in_array(get_post_type($post_id), $disabled_types, true)) {
				$this->disabled_for_request = true;
			} elseif ($post_id && get_post_meta($post_id, Onyx_Dark_Mode_Switcher_Settings::DISABLE_META_KEY, true) === '1') {
				$this->disabled_for_request = true;
			}
		}

		return $this->disabled_for_request;
	}

	/**
	 * Resolve the starting mode before the page paints.
	 *
	 * public.js cannot do this on its own: it depends on jQuery and on the
	 * localized onyx_obj, both of which print later in the head, so the browser
	 * would render the page light and flip it a moment later. This snippet is
	 * dependency free and carries the handful of values it needs inline.
	 */
	public function print_initial_mode_script() {
		if ($this->is_disabled_for_request()) {
			return;
		}

		$config = array(
			'schedule' => $this->dark_mode_settings['enable_schedule'] === 'on' ? '1' : '0',
			'start' => $this->dark_mode_settings['schedule_start'],
			'end' => $this->dark_mode_settings['schedule_end'],
			'os' => $this->dark_mode_settings['enable_os_aware'] === 'on' ? '1' : '0',
			'fallback' => $this->dark_mode_settings['enable_default_dark_mode'] === 'on' ? '1' : '0',
		);

		$script = '(function(){'
			. 'var c=' . wp_json_encode($config) . ',d=document.documentElement;'
			. 'function m(t){var p=/^(\d{2}):(\d{2})$/.exec(t||"");if(!p)return null;'
			. 'var h=+p[1],i=+p[2];return h>23||i>59?null:h*60+i;}'
			. 'function s(){if(c.schedule!=="1")return null;'
			. 'var a=m(c.start),b=m(c.end);if(a===null||b===null||a===b)return null;'
			. 'var n=new Date();n=n.getHours()*60+n.getMinutes();'
			. 'return a<b?(n>=a&&n<b):(n>=a||n<b);}'
			. 'var v=null;try{v=window.localStorage.getItem("onyx_last_state");}catch(e){}'
			. 'var k;if(v==="1"||v==="0"){k=v==="1";}else{var z=s();'
			. 'if(z!==null){k=z;}'
			. 'else if(c.os==="1"&&window.matchMedia("(prefers-color-scheme: dark)").matches){k=true;}'
			. 'else{k=c.fallback==="1";}}'
			. 'window.onyxInitialDarkMode=k;'
			. 'if(k){d.classList.add("onyx-dark-mode");}'
			. '})();';

		echo "<script id=\"onyx-initial-mode\">" . $script . "</script>\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	public function include_files() {
		// include_once: style.php declares functions, so a second instantiation
		// of this class would otherwise fatal on redeclare.
		include_once ONYX_PATH . 'public/inc/style.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ($this->dark_mode_settings['enable'] != 'on' || $this->is_disabled_for_request()) {
			return;
		}

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/public.css', array(), $this->version, 'all');

		wp_add_inline_style($this->plugin_name, onyx_dymanic_styles($this->dark_mode_settings));

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

		if ($this->dark_mode_settings['enable'] != 'on' || $this->is_disabled_for_request()) {
			return;
		}

		$replace_images_array = array_filter((array) $this->dark_mode_settings['replace_images'], function ($item) {
			if (!is_array($item)) {
				return false;
			}

			$org_image = isset($item['org_image']) ? trim($item['org_image']) : '';
			$dark_image = isset($item['dark_image']) ? trim($item['dark_image']) : '';

			return $org_image !== '' || $dark_image !== '';
		});

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public.js', array('jquery'), $this->version, false);
		wp_localize_script($this->plugin_name, 'onyx_obj', array(
			'image_replacements_arr' => $replace_images_array,
			'invert_images_arr' => array_filter((array) $this->dark_mode_settings['invert_images']),
			'enable_default_dark_mode' => $this->dark_mode_settings['enable_default_dark_mode'],
			'enable_os_aware' => $this->dark_mode_settings['enable_os_aware'],
			'enable_schedule' => $this->dark_mode_settings['enable_schedule'],
			'schedule_start' => $this->dark_mode_settings['schedule_start'],
			'schedule_end' => $this->dark_mode_settings['schedule_end'],
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

		$before_trigger = !empty($this->dark_mode_settings['before_js']) ? $this->dark_mode_settings['before_js'] : '';
		$after_trigger = !empty($this->dark_mode_settings['after_js']) ? $this->dark_mode_settings['after_js'] : '';

		// Already sanitized on save by onyx_sanitize_custom_js(). Do not run it
		// through an HTML filter here, that would corrupt valid JavaScript.
		if ($before_trigger !== '') {
			wp_add_inline_script($this->plugin_name, 'jQuery(document).bind("onyx_before_toggle", function (event, response) {' . $before_trigger . '});');
		}
		if ($after_trigger !== '') {
			wp_add_inline_script($this->plugin_name, 'jQuery(document).bind("onyx_after_toggle", function (event, response) {' . $after_trigger . '});');
		}

	}

	public function toggle_button() {
		if ($this->is_disabled_for_request()) {
			return;
		}

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
		if ($this->is_disabled_for_request()) {
			return $items;
		}

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
