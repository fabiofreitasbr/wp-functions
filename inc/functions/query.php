<?php 
// MODIFICAR O QUERY DOS POSTS
function modifyQuery($query) {
    if (is_tax('institucionalcat','patologistas-clinicos') || is_tax('programqualicat','laboratorios-acreditados') || is_tax('laboratorios-estado') || is_tax('patologistas-estado')) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
    else if (is_tax('cursoseventoscat')) {
        $query->set('orderby', 'meta_value');   
        $query->set('meta_key', 'data_inicial');   
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'modifyQuery');
?>