<?php 
function wooGallery() {
    ?>
    <div id="example3" class="slider-pro">
        <div class="sp-slides">
            <?php
            global $post, $product;

            $attachment_ids = $product->get_gallery_image_ids();
            $slide = '';
            $icones = '';
            if ( $attachment_ids && has_post_thumbnail() ) {
                foreach ( $attachment_ids as $attachment_id ) {
                    $full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
                    $medium_image = wp_get_attachment_image_src( $attachment_id, 'medium' );
                    $thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
                    $image_title     = get_post_field( 'post_excerpt', $attachment_id );

                    $attributes = array(
                        'title'                   => $image_title,
                        'data-src'                => $full_size_image[0],
                        'data-large_image'        => $full_size_image[0],
                        'data-large_image_width'  => $full_size_image[1],
                        'data-large_image_height' => $full_size_image[2],
                    );
                    // var_dump($full_size_image);

                    $slide .= '<div class="sp-slide">';
                    $slide .= '<img class="sp-image"
                        src="' . $full_size_image[0] . '" 
                        data-src="' . $full_size_image[0] . '"
                        data-small="' . $medium_image[0] . '"
                        data-medium="' . $full_size_image[0] . '"
                        data-large="' . $full_size_image[0] . '"
                        data-retina="' . $thumbnail[0] . '" />';
                    $slide .= '</div>';



                    $html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
                    $html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
                    $html .= '</a></div>';

                    $icones .= '<img class="sp-thumbnail" src="' . $thumbnail[0] . '"/>';

                    // apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
                }
            }

            echo $slide;
            ?>
        </div>
        <div class="sp-thumbnails">
            <?php 
                echo $icones;
             ?>
        </div>
    </div>
    <?php 
}
?>