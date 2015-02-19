<?php

/*Meta title and meta description metaboxes*/
add_action('add_meta_boxes', 'cos_add_meta_box');

function cos_add_meta_box() {
    $screens = get_option('cos_post_types', array('post', 'page'));
    foreach ($screens as $screen)
        add_meta_box('cos_mb', _MENU_TITLE, 'cos_meta_box_callback', $screen, 'normal', 'high');
}

function cos_meta_box_callback($post) {
    $do_meta_title = get_option('cos_custom_meta_title');
    if ($do_meta_title) {
        $custom_meta_title = get_post_meta($post->ID, 'cos_custom_meta_title', true);
        meta_box_field('cos_custom_meta_title', 'Meta title', 'text', $custom_meta_title);
    }

    $do_meta_description = get_option('cos_custom_meta_description');
    if ($do_meta_description) {
        $custom_meta_description = get_post_meta($post->ID, 'cos_custom_meta_description', true);
        meta_box_field('cos_custom_meta_description', 'Meta description', 'text', $custom_meta_description);
    }
}

function meta_box_field($name, $label, $type, $value) {
    echo '<div class="rwmb-field rwmb-text-wrapper">';
    echo '<div class="rwmb-label">';
    echo '<label for="us_section_background_image">' . $label . '</label>';
    echo '</div>';
    echo '<div class="rwmb-input">';
    echo '<input type="' . $type . '" class="rwmb-text" name="' . $name . '" id="' . $name . '" value="' . $value . '" size="30">';
    echo '</div></div>';
}

add_action('save_post', 'cos_save_meta_box_data');

function cos_save_meta_box_data($post_id) {
    if (isset($_POST['cos_custom_meta_title']))
        update_post_meta($post_id, 'cos_custom_meta_title', $_POST['cos_custom_meta_title']);
    if (isset($_POST['cos_custom_meta_description']))
        update_post_meta($post_id, 'cos_custom_meta_description', $_POST['cos_custom_meta_description']);
}
