<?php
/**
 * Plugin Name: GuardianPass Password Protect
 * Description: password-protect individual pages or posts.
 * Version: 1.0
 * Author: Fishon Amos
 */

function guardianpass_content($content) {
    global $post;

    if (post_password_required($post)) {
        $password_form = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                            <label for="password">' . esc_html__('Password:', 'guardianpass') . '</label>
                            <input type="password" name="post_password" id="password" size="20" />
                            <input type="submit" name="Submit" value="' . esc_attr__('Submit', 'guardianpass') . '" />
                        </form>';

        $content = $password_form;
    }

    return $content;
}

add_filter('the_content', 'guardianpass_content');

function guardianpass_styles() {
    wp_enqueue_style('guardianpass-styles', plugin_dir_url(__FILE__) . 'styles.css');
}

add_action('wp_enqueue_scripts', 'guardianpass_styles');
