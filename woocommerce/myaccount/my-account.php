<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content account-content col-md-9 col-lg-9">
	<?php
		do_action( 'woocommerce_account_content' );
	?>
</div>
