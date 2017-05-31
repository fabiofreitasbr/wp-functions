<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*
?>
<aside class="col-md-3 filtrar-dados">
<?php 
dynamic_sidebar('widget-loja');
/*
 ?>
    <form class="woocommerce-ordering" method="get">
        <select name="orderby" class="orderby">
            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
            <?php endforeach; ?>
        </select>
        <?php wc_query_string_form_fields( null, array( 'orderby', 'submit' ) ); ?>
    </form>

?>
</aside>
*/