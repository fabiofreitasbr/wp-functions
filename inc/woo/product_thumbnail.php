<?php
function product_thumbnail_moms( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0) {
    global $post;
    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    if ( has_post_thumbnail() ) {
        $props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
        echo get_the_post_thumbnail( $post->ID, $image_size, array(
            'title'  => $props['title'],
            'alt'    => $props['alt'],
            'class'  => 'img-responsive'
        ) );
    } elseif ( wc_placeholder_img_src() ) {
        echo '<img src="' . get_bloginfo("template_url") . '/img/produto-sem-imagem.gif" class="img-responsive">';
    }
}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action('woocommerce_before_shop_loop_item_title', 'product_thumbnail_moms', 11);
?>