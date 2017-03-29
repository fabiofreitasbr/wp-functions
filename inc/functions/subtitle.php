<?php 
/*
function subtitle_metabox() {
    add_meta_box('subtitle', __('Subtítulo', 'textdomain'), 'wpdocs_metabox_callback', array('page', 'post'), 'normal', 'core' );
}
add_action( 'add_meta_boxes', 'subtitle_metabox' );

function wpdocs_metabox_callback( $post, $metabox ) {
    // Output last time the post was modified.
    echo 'Last Modified: ' . $post->post_modified;
 
    // Output 'this'.
    echo $metabox['args']['foo'];
 
    // Output 'that'.
    echo $metabox['args']['bar'];
 
    // Output value of custom field.
    echo get_post_meta( $post->ID, 'wpdocs_custom_field', true );
}
*/
?>