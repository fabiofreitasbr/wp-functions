<?php 
// MODIFICAR O QUERY DOS POSTS
function modifyQuery($query) {
    if (is_tax('institucionalcat','patologistas-clinicos')) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifyQuery');
?>