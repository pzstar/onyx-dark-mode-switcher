<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Per entry "disable dark mode" control.
 *
 * Adds a small checkbox to every public post type so a single page can opt out
 * of dark mode without needing a CSS selector in the global settings.
 *
 * @package    Onyx_Dark_Mode_Switcher
 * @subpackage Onyx_Dark_Mode_Switcher/admin
 */
class Onyx_Dark_Mode_Switcher_Metabox {

    const NONCE_ACTION = 'onyx_save_disable_dark_mode';
    const NONCE_NAME = 'onyx_disable_dark_mode_nonce';

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'register_meta_box'));
        add_action('save_post', array($this, 'save'), 10, 2);
    }

    public function register_meta_box() {
        foreach (get_post_types(array('public' => true)) as $post_type) {
            add_meta_box(
                'onyx-dark-mode',
                esc_html__('Onyx Dark Mode', 'onyx-dark-mode-switcher'),
                array($this, 'render'),
                $post_type,
                'side',
                'default'
            );
        }
    }

    public function render($post) {
        $disabled = get_post_meta($post->ID, Onyx_Dark_Mode_Switcher_Settings::DISABLE_META_KEY, true) === '1';

        wp_nonce_field(self::NONCE_ACTION, self::NONCE_NAME);
        ?>
        <p>
            <label>
                <input type="checkbox" name="onyx_disable_dark_mode" value="1" <?php checked($disabled); ?> />
                <?php esc_html_e('Disable dark mode on this page', 'onyx-dark-mode-switcher'); ?>
            </label>
        </p>
        <p class="description">
            <?php esc_html_e('The switch is hidden and the page always renders in its normal colors.', 'onyx-dark-mode-switcher'); ?>
        </p>
        <?php
    }

    public function save($post_id, $post) {
        // Autosave and revisions fire save_post without the meta box fields, so
        // saving here would wipe the stored value.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
            return;
        }

        // Absent nonce means this save did not come from an editor screen that
        // rendered the meta box, so there is nothing of ours to persist.
        if (!isset($_POST[self::NONCE_NAME])) {
            return;
        }

        if (!wp_verify_nonce(sanitize_key(wp_unslash($_POST[self::NONCE_NAME])), self::NONCE_ACTION)) {
            return;
        }

        $post_type_object = get_post_type_object($post->post_type);
        if (!$post_type_object || !current_user_can($post_type_object->cap->edit_post, $post_id)) {
            return;
        }

        if (isset($_POST['onyx_disable_dark_mode'])) {
            update_post_meta($post_id, Onyx_Dark_Mode_Switcher_Settings::DISABLE_META_KEY, '1');
        } else {
            delete_post_meta($post_id, Onyx_Dark_Mode_Switcher_Settings::DISABLE_META_KEY);
        }
    }

}

new Onyx_Dark_Mode_Switcher_Metabox();
