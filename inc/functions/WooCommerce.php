<?php 

// FILTROS 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

// SUPORTE WOOCOMMERCE
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// REMOVE O BOTÃO ADICIONAR AO CARRINHO E PREÇOS
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter('add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
    global $woocommerce;

    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart(); 
    }
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}


add_filter( 'wc_add_to_cart_message', 'bbloomer_custom_add_to_cart_message' );
 
function bbloomer_custom_add_to_cart_message() {
    global $woocommerce;
    $return_to  = get_permalink(woocommerce_get_page_id('shop'));
    $message    = sprintf('<a href="%s" class="button wc-forwards">%s</a> %s', $return_to, __('Continue Shopping', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
    return $message;
}
?>