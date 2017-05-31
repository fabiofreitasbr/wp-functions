<?php 
function titleName() {
    global $page_title, $post, $wp_query;
    if (is_page()) {
        echo get_the_title($post->post_parent);
    }
    else if (is_category()){
        echo single_cat_title('',false);
    }
    else if (is_search()) {
        echo __('Resultados de: ','cactusthemes').(esc_html(isset($_GET['s']))?esc_html($_GET['s']):'');
    }
    else if (is_tag()){
        echo single_tag_title('',false);
    }
    else if (is_single()) {
        // $categorias = get_the_category();
        // echo $categorias[0]->name;
        $slug_postType = $post->post_type;
        $dados_postType = get_post_type_object( $slug_postType );
        echo $dados_postType->labels->name;
    }
    else if (is_tax()){
        // echo single_term_title('',false);
        $slug_postType = $post->post_type;
        $dados_postType = get_post_type_object( $slug_postType );
        echo $dados_postType->labels->name;
    }
    else if (is_post_type_archive()){
        // echo single_term_title('',false);
        $slug_postType = $post->post_type;
        $dados_postType = get_post_type_object( $slug_postType );
        echo $dados_postType->labels->name;
    }else if (is_author()){
        echo __("Autor: ",'cactusthemes') . get_the_author();
    }else if (is_day()){
        echo __("",'cactusthemes') . date_i18n(get_option('date_format') ,strtotime(get_the_date()));
    }else if (is_month()){
        echo __("",'cactusthemes') . get_the_date('F, Y');
    }else if (is_year()){
        echo __("",'cactusthemes') . get_the_date('Y');
    }else if (is_home()){
        if(get_option('page_for_posts')){ echo get_the_title(get_option('page_for_posts'));
        }
        else{
            echo get_bloginfo('name');
        }
    }else if (is_404()){
        echo 'PÁGINA NÃO ENCONTRADA';
    }else if(  function_exists ( "is_shop" ) && is_shop()){
            echo woocommerce_page_title($echo = false);
    }else{
        global $post;
        if($post){echo $post->post_title;}
    }
}
?>