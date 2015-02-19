<?php
/**
 * Add Fancier Author Box to post/page content
 *
 * @since 1.0
 */
add_filter('the_content', 'cos_add_user_bio_box', 15);

function cos_add_user_bio_box($content) {
    if (is_main_query()) {
        global $authordata;
        global $post;
        if (is_singular('post') || is_singular('page')) {
            $content .= cos_construct_user_bio_box($authordata->ID);
        }
    }

    return $content;
}

function cos_construct_user_bio_box($user_id) {
    $user_email = get_userdata($user_id)->data->user_email;
    $google_plus_id = get_user_meta($user_id, 'cos_googleplus', true);
    $description = get_user_meta($user_id, 'description', true);
    $nickname = get_user_meta($user_id, 'nickname', true);
    ob_start();
    ?>
    <div class="cos_user_bio">
        <div class="cos_user_bio_avatar">
            <?php echo get_avatar($user_email); ?>
            <span class="fn" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
                <meta content="https://plus.google.com/<?php echo $google_plus_id; ?>" itemprop="url">
                <a class="g-profile" href="https://plus.google.com/<?php echo $google_plus_id; ?>" rel="author" title="author profile" data-gapiscan="true" data-onload="true" data-gapiattached="true">
                    <span itemprop="name"><?php echo $nickname; ?></span>
                </a>
            </span>
        </div>
        <div class="author-profile" itemprop="author" itemtype="http://schema.org/Person">
            <div class="cos_user_bio_description" itemprop="description">
                <?php echo $description; ?>
            </div>
        </div>
    </div>
    <?php
    $bio_user_box = ob_get_contents();
    ob_end_clean();
    return $bio_user_box;
}
