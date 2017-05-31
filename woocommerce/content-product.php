<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<article <?php /* post_class(); */ ?> class="col-lg-4 col-md-4 col-sm-6 box">
	<?php
		do_action( 'woocommerce_before_shop_loop_item' );
	?>
	<figure>
		<div class="imgbox-fig">
			<?php 
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</div>
		<div class="imgbox-caption">
			<?php
				do_action( 'woocommerce_shop_loop_item_title' );
			?>
		</div>
	</figure>
	<?php
	
		do_action( 'woocommerce_after_shop_loop_item_title' );

		do_action( 'woocommerce_after_shop_loop_item' );
	?>
</article>