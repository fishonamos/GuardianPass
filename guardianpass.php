<?php
/**
 * Plugin Name: GuardianPass Password Protect
 * Description: password-protect individual pages or posts.
 * Version: 1.0
 * Author: Fishon Amos
 */

function simple_password_protect_content($content) {
    global $post;

    if (post_password_required($post)) {
        $password_form = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                            <label for="password">' . esc_html__('Password:', 'simple-password-protect') . '</label>
                            <input type="password" name="post_password" id="password" size="20" />
                            <input type="submit" name="Submit" value="' . esc_attr__('Submit', 'simple-password-protect') . '" />
                        </form>';

        $content = $password_form;
    }

    return $content;
}

add_filter('the_content', 'simple_password_protect_content');

function simple_password_protect_styles() {
    wp_enqueue_style('simple-password-protect-styles', plugin_dir_url(__FILE__) . 'styles.css');
}

add_action('wp_enqueue_scripts', 'simple_password_protect_styles');
