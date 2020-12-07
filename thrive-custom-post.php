<?php
/**
 * @package Thrive Custom Post
 * @version 0.1
 */
/*
Plugin Name: Thrive Custom Post
Description: A custom post 
Author: Roddick Osipov
Version: 0.1
*/


/* Register our custom post type function with arguments
 */
function rdk_custom_post_type() {
    register_post_type('rdk_post',
        array(
            'labels'      => array(
                'name'          => __('Custom Roddick Post', 'textdomain'),
                'singular_name' => __('Custom Roddick Post', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'thrive_global'), //'thrive_global' slug - for branding
                'show_in_rest' => true,  //We want this available to the REST api 
                'supports' => array('editor', 'title'), //we want gutenberg editor, title field
        )
    );
}


/* Generate the HTML for our metavalue input field, prepopulating it if the value already exists
 * @param array $post Post values 
 */
function rdk_metabox_html($post) {
    $existing_rdk_value = get_post_meta($post->ID, '_rdk_meta_key', true);
    ?>
    <label for="rdk_meta_field">Your meta value goes here!</label>
    <input type="text" id="rdk_meta_field" name="rdk_meta_field" value="<?php empty($existing_rdk_value) ? print(""):print($existing_rdk_value) ?>" class="metabox_string_field" 
    <?php
}

/* Register meta boxes.
 */
function rdk_add_meta_boxes() {
    add_meta_box( 'rdk',
                  __( 'Roddick\'s Custom Metabox', 'rdk' ),
                  'rdk_metabox_html',  //our Callback
                  null, 
                  'side', 
                  'high', 
                  'rdk_post' ); // The custom post type we just registered above
}

/* Save the our custom meta value
*/
function rdk_save_postdata($post_id) {
    if ( array_key_exists('rdk_meta_field', $_POST) ) {
        update_post_meta(
            $post_id,
            '_rdk_meta_key',
            $_POST['rdk_meta_field']
        );
    }
}

add_action('save_post', 'rdk_save_postdata');
add_action('add_meta_boxes', 'rdk_add_meta_boxes');
add_action('init', 'rdk_custom_post_type');
