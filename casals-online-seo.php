<?php

/**
 * Plugin Name: Casals Online SEO.
 * Plugin URI: http://casalsonline.es
 * Description: SEO improvements for Wordpress site.
 * Version: 0.0.3
 * Author: Casals Online, S.L.
 * Author URI: http://casalsonline.es
 * Text Domain: casals
 * Domain Path: /locale/
 * Network: true
 * License: GPL2
 */
require_once 'settings.php';
require_once _FUNCTIONS_PATH . 'actions.php';
require_once _FUNCTIONS_PATH . 'filters.php';
require_once _FUNCTIONS_PATH . 'metaboxes.php';

/* Save configuration data */
if (isset($_POST['save_options'])) {
    update_option('cos_custom_meta_title', $_POST['custom_meta_title'] == 'on' ? true : false);
    update_option('cos_custom_meta_description', $_POST['custom_meta_description'] == 'on' ? true : false);
    update_option('cos_post_types', $_POST['post_type']);
    update_option('cos_bio_user', $_POST['bio_user'] == 'on' ? true : false);
}
