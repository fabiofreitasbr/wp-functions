<?php 
function excerptLenght( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'excerptLenght', 999 );
?>