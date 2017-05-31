<?php 
function postTypeTitle() {  
    global $post, $wp_query;
    $post_type = get_post_type_object(get_post_type());
    echo $post_type->labels->name;
}
function postTypeLink() {  
    global $post, $wp_query;
    echo get_post_type_archive_link(get_post_type());
}

 ?>