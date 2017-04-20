<?php 

function ListagemPostTypeTudo( $query ){
    if( ! is_admin()
        && $query->is_tax('institucional')
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'ListagemPostTypeTudo' );


 ?>