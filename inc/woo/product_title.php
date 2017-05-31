<?php

function product_title_woocommerce() {
    ?>
    <p>Teresópolis, RJ</p>
    <h3 class="woocommerce-loop-product__title"><?php echo get_the_title(); ?></h3>
    <?php
}
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'product_title_woocommerce', 11 );
?>