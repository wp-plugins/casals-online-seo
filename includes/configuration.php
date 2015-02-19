<div class="wrap">
    <h2><?php echo _PAGE_TITLE; ?></h2>
</div>
<div>
    <form action="" method="post">
        <input type="hidden" value="true" name="save_options"/>
        <table id="configuration_table">
            <tr>
                <td><label>Site's URL</label></td>
                <td><input type="url" value="<?php echo $site_url; ?>" name="site_url"/></td>
            </tr>
            <tr>
                <td><label>BIO User</label></td>
                <td><input type="checkbox" name="bio_user" <?php echo $bio_user ? "checked" : ''; ?>></td>
            </tr>
            <tr>
                <td><label>Custom meta title</label></td>
                <td><input type="checkbox" name="custom_meta_title" <?php echo $custom_meta_title ? "checked" : ''; ?>></td>
            </tr> 
            <tr>
                <td><label>Custom meta description</label></td>
                <td><input type="checkbox" name="custom_meta_description" <?php echo $custom_meta_description ? "checked" : ''; ?>></td>
            </tr>
            <tr>
                <td><label>Post types</label></td>
                <td>
                    <ul>
                        <?php foreach (get_post_types() as $post_type): ?>
                            <?php $post_type_obj = get_post_type_object($post_type); ?>
                            <li>
                                <input type="checkbox" id="<?php echo $post_type_obj->name; ?>" name="post_type[]" value="<?php echo $post_type_obj->name; ?>" <?php echo in_array($post_type_obj->name, $post_types) ? 'checked' : ''; ?>/>
                                <label for="<?php echo $post_type_obj->name; ?>"><?php echo $post_type_obj->labels->name; ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        </table>
        <input type="submit" name="" id="" class="button action" value="Guardar">
    </form>
</div>