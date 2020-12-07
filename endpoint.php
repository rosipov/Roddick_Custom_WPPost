<?php

// endpoint.php is where the plugin code handles the custom endpoint logic to return all of the rdk_post meta values in JSON

/* Get and return all of the posts' metavalues of the custom type Roddick post aka "rdk_post" 
 *
 * @param array $data Options for the function.
 * @return array $result Post title:metavalues for all rdk_post posts or null if none exist.
 */
function get_all_rdk_posts_metavalue($data) {
    $result = [];

    //Here is where one would account for security; check nonce, check user role, etc.

    $posts = get_posts(array( //get all posts by our custom post type 
        'post_type' => 'rdk_post',
    ));

    if (!empty($posts)) { //if there are posts of type 'rdk_post'...
        foreach($posts as $post) { //...push the resulting value to the end of our array
           array_push($result, get_post_meta($post->ID, '_rdk_meta_key')[0]);
        } 
    }

    $response = new WP_REST_RESPONSE($result); //response will be 200 regardless whether empty data set or not
    return $response;
}

//init our 'get all the posts metavalue' route 
add_action('rest_api_init', function() {
    register_rest_route('thrive_global/', '/roddick_posts', array(
        'methods' => 'GET',
        'callback' => 'get_all_rdk_posts_metavalue',
    ));
});
?>
