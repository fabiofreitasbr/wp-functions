<?php 
function excerptLenght( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'excerptLenght', 999 );
?>