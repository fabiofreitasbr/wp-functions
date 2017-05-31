<?php 
add_action('comment_post','comment_ratings');
 
function comment_ratings($comment_id) {
    add_comment_meta($comment_id, 'rating', $_POST['rating']);
}
?>