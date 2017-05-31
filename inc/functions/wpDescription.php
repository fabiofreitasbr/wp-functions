<?php 
/* CARREGAR TÍTULO DAS PÁGINAS*/
function wp_description() {
    $custom_field_meta_description = get_post_meta(get_the_ID(), 'meta_description_field', true);
    if ($custom_field_meta_description != '') {
        return $custom_field_meta_description;
    }
    else if ( is_single() ) {
        return get_the_title();
    }
    else if ( is_category() ) {
        return get_single_cat_title();
    } 
    /*
    else if ( is_tag() ) {
        return get_single_tag_title(); get single tag não está funcionando
    } 
    */
    else if ( is_page() ){
        return get_the_title();
    }
    else {
        return get_bloginfo('description');
    }
}
?>