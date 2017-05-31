<?php 
function taxonomyTitle() {  
    global $post;
    $post_type = get_post_type_object(get_post_type());
    $slug = $post_type->rewrite;
    $type = get_post_type( $post->ID );
    $categoriaSlug = get_object_taxonomies( $type );
    // echo $type;
    $categoria = get_the_terms($post->ID, $categoriaSlug[0]);
    echo $categoria[0]->name;
}
function taxonomyLink() {  
    global $post;
    $post_type = get_post_type_object(get_post_type());
    $slug = $post_type->rewrite;
    $type = get_post_type( $post->ID );
    $categoriaSlug = get_object_taxonomies( $type );
    // echo $type;
    $categoria = get_the_terms($post->ID, $categoriaSlug[0]);
    $categoriaLink = get_term_link($categoria[0]->term_id, $categoriaSlug[0]);
    echo $categoriaLink;
}

 ?>