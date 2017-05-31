<?php

add_filter( 'woocommerce_account_menu_items', 'custom_woocommerce_account_menu_items' );
function custom_woocommerce_account_menu_items( $items ) {
    if ( isset( $items['downloads'] ) ) unset( $items['downloads'] );
    return $items;
}
?>