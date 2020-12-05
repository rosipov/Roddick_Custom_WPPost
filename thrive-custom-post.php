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

// Register our custom post type function with arguments
function rdk_custom_post_type() {
    register_post_type('rdk_post',
        array(
            'labels'      => array(
                'name'          => __('Custom Roddick Post', 'textdomain'),
                'singular_name' => __('Custom Roddick Post', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
                'rewrite' => array( 'slug' => 'thrive'), //'thrive' slug - for branding
                'show_in_rest' => true, 
                'supports' => array('editor', 'title'), //include the gutenberg editor, title field
        )
    );
}
add_action('init', 'rdk_custom_post_type');

