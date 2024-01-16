<?php
/**
 * Plugin Name: GuardianPass Password Protect
 * Description: password-protect individual pages or posts.
 * Version: 1.0
 * Author: Fishon Amos
 */

function guardianpass_content($content) {
    global $post;

    //check page to know if is has password
    if (post_password_required($post)) {
        // Display password form
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

// Shortcode
function guardianpass_shortcode($atts) {
    // Display password
    $password_form = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                        <label for="password">' . esc_html__('Password:', 'guardianpass') . '</label>
                        <input type="password" name="post_password" id="password" size="20" />
                        <input type="submit" name="Submit" value="' . esc_attr__('Submit', 'guardianpass') . '" />
                    </form>';

    return $password_form;
}

add_shortcode('guardianpass', 'guardianpass_shortcode');
