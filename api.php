<?php
/**
 * Get all of the posts' metavalues of the custom type "rdk_post" 
 *
 * @param array $data Options for the function.
 * @return array|null Post title:metavalues for all rdk_post posts or null if none exist.
 */
function get_all_thrive_posts_metavalue($data) {
    $result = [];
    $posts = get_posts(array( //get all posts by our custom post type 
        'post_type' => 'rdk_post',
    ));

    if (empty($posts)) { //if empty lets return nothing for now...
        return null;
    } 

    foreach($posts as $post) { //...otherwise create a new title:metadata key value pair in our array
        $result[$post->post_title] = get_post_meta($post->ID, '_rdk_post_key')[0];  
    } 

    return $result;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'thriveglobal/', '/thrive_posts/', array(
        'methods' => 'GET',
        'callback' => 'get_all_thrive_posts_metavalue',
    ));
});
?>
