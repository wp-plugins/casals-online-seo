<?php

/* Enqueue script and css files */
add_action('wp_enqueue_scripts', 'cos_enqueue_scripts');

function cos_enqueue_scripts() {
    wp_enqueue_style('cos_user_bio_box', _CSS_DIR . 'user_bio_box.css');
}

/* Add menu item for configuration */
add_action('admin_menu', 'cos_menu');

function cos_menu() {
    add_menu_page(_PAGE_TITLE, _MENU_TITLE, 'manage_options', _MENU_SLUG, 'admin_config_page', _IMG_DIR . 'favicon.png', 80);
}

/* Admin configuration page */

function admin_config_page() {
    $site_url = get_site_url();
    $bio_user = get_option('cos_bio_user');
    $custom_meta_title = get_option('cos_custom_meta_title');
    $custom_meta_description = get_option('cos_custom_meta_description');
    $post_types = get_option('cos_post_types', array('post', 'page'));

    require_once _INCLUDES_PATH . 'configuration.php';
}

/* Head meta title and meta description action */
add_action('wp_head', 'cos_head');

function cos_head() {
    $post_id = get_the_ID();
    $custom_meta_title = get_post_meta($post_id, 'cos_custom_meta_title', true);
    $custom_meta_description = get_post_meta($post_id, 'cos_custom_meta_description', true);

    echo '<meta name="title" content="' . $custom_meta_title . '">';
    echo '<meta name="description" content="' . $custom_meta_description . '">';
}

/* User profile BIO user data */

add_action('edit_user_profile', 'cos_extra_user_details');
add_action('show_user_profile', 'cos_extra_user_details');

function cos_extra_user_details($user) {
    if (get_option('cos_bio_user') && user_can($user, 'edit_posts'))
        require_once _INCLUDES_PATH . 'user.php';
}

add_action('personal_options_update', 'cos_save_extra_profile_fields');
add_action('edit_user_profile_update', 'cos_save_extra_profile_fields');

function cos_save_extra_profile_fields($user_id) {

    if (!current_user_can('edit_user', $user_id))
        return false;

//    update_user_meta($user_id, 'ts_fab_twitter', strip_tags($_POST['ts_fab_twitter']));
//    update_user_meta($user_id, 'ts_fab_facebook', strip_tags($_POST['ts_fab_facebook']));
    update_user_meta($user_id, 'cos_googleplus', strip_tags($_POST['cos_googleplus']));
//    update_user_meta($user_id, 'ts_fab_linkedin', strip_tags($_POST['ts_fab_linkedin']));
//    update_user_meta($user_id, 'ts_fab_instagram', strip_tags($_POST['ts_fab_instagram']));
//    update_user_meta($user_id, 'ts_fab_flickr', strip_tags($_POST['ts_fab_flickr']));
//    update_user_meta($user_id, 'ts_fab_pinterest', strip_tags($_POST['ts_fab_pinterest']));
//    update_user_meta($user_id, 'ts_fab_tumblr', strip_tags($_POST['ts_fab_tumblr']));
//    update_user_meta($user_id, 'ts_fab_youtube', strip_tags($_POST['ts_fab_youtube']));
//    update_user_meta($user_id, 'ts_fab_vimeo', strip_tags($_POST['ts_fab_vimeo']));
//    update_user_meta($user_id, 'ts_fab_position', strip_tags($_POST['ts_fab_position']));
//    update_user_meta($user_id, 'ts_fab_company', strip_tags($_POST['ts_fab_company']));
//    update_user_meta($user_id, 'ts_fab_company_url', esc_url_raw($_POST['ts_fab_company_url']));
}
