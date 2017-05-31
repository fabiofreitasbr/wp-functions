<?php 
$woof_reset_btn_txt = "Resetar";
$woof_filter_btn_txt = "Resetar";
function woocommerce_content() {

    if ( is_singular( 'product' ) ) {

        while ( have_posts() ) : the_post();

            wc_get_template_part( 'content', 'single-product' );

        endwhile;

    }
    else {
        ?>

        <?php
        /* 
        if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif;
        */
        ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

            <?php /* do_action( 'woocommerce_before_shop_loop' ); */ ?>
            <aside class="col-md-3 filtrar-dados"><?php dynamic_sidebar('widget-loja'); ?></aside>

            <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>
            <?php woocommerce_product_loop_end(); ?>
            <nav class="count-product"></nav>

            <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php do_action( 'woocommerce_no_products_found' ); ?>
        <?php endif;

    }
    ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".woof_block_html_items").slideUp(0);

                    $(".woof_container_inner h4").on("click", function () {
                        $(this).parent().children(".woof_block_html_items").slideToggle(300)
                    });
                });
            </script>
    <?php
}
?>