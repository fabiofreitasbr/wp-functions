<?php
function titleName() {
    global $page_title, $post;
    if (is_search()) {
        $page_title = __('Resultados de: ','cactusthemes').(esc_html(isset($_GET['s']))?esc_html($_GET['s']):'');
    } 
    else if (is_category()) {
        $page_title = single_cat_title('',false);
    } 
    else if (is_tag()) {
        $page_title = single_tag_title('',false);
    }
    else if (is_single()) {
        $categorias = get_the_category();
        $page_title = $categorias[0]->name;
    }
    else if (is_tax()) {
        $slug_postType = $post->post_type;
        $dados_postType = get_post_type_object( $slug_postType );
        $page_title = $dados_postType->labels->name;
    }
    else if (is_post_type_archive()) {
        $slug_postType = $post->post_type;
        $dados_postType = get_post_type_object( $slug_postType );
        $page_title = $dados_postType->labels->name;
    } 
    else if (is_author()) {
        $page_title = __("Autor: ",'cactusthemes') . get_the_author();
    } 
    else if (is_day()) {
        $page_title = __("",'cactusthemes') . date_i18n(get_option('date_format') ,strtotime(get_the_date()));
    } 
    else if (is_month()) {
        $page_title = __("",'cactusthemes') . get_the_date('F, Y');
    } 
    else if (is_year()) {
        $page_title = __("",'cactusthemes') . get_the_date('Y');
    } 
    else if (is_home()) {
        if (get_option('page_for_posts')) {
            $page_title = get_the_title(get_option('page_for_posts'));
        }
        else {
            $page_title = get_bloginfo('name');
        }
    } 
    else if (is_404()) {
        $page_title = 'Página Não Encontrada';
    }
    else if (  function_exists ( "is_shop" ) && is_shop()) {
            $page_title = woocommerce_page_title($echo = false);
    }
    else {
        global $post;
        if ($post) {
            $page_title = $post->post_title;
        }
    }

    if ($page_title == '') {
        $page_title = 'NÃO ENCONTRADO';
    }
    echo $page_title;
}
?>