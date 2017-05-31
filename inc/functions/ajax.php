<?php

// Adiciona um script para o WordPress
add_action( 'wp_enqueue_scripts', 'secure_enqueue_script' );
function secure_enqueue_script() {
    wp_register_script( 'secure-ajax-access', esc_url( add_query_arg( array( 'js_global' => 1 ), site_url() ) ) );
    wp_enqueue_script( 'secure-ajax-access' );
}

// Joga o nonce e a url para as requisições para dentro do Javascript criado acima
add_action( 'template_redirect', 'javascript_variaveis' );
function javascript_variaveis() {
    if ( !isset( $_GET[ 'js_global' ] ) ) return;

    $nonce = wp_create_nonce('select_post_nonce');

    $variaveis_javascript = array(
        // Esta função cria um nonce para nossa requisição para buscar mais notícias, por exemplo.
        'select_post_nonce' => $nonce,
        // Forma para pegar a url para as consultas dinamicamente.
        'xhr_url'             => admin_url('admin-ajax.php')
    );

    $new_array = array();
    foreach( $variaveis_javascript as $var => $value ) {
        $new_array[] = esc_js( $var ) . " : '" . esc_js( $value ) . "'";
    }

    header("Content-type: application/x-javascript");
    printf('var %s = {%s};', 'js_global', implode( ',', $new_array ) );
    exit;
}

add_action('wp_ajax_nopriv_select_post', 'select_post');
add_action('wp_ajax_select_post', 'select_post');

function select_post() {

    if( ! wp_verify_nonce( $_POST['select_post_nonce'], 'select_post_nonce' ) ) {
        // Caso não seja verificado o nonce enviado, a requisição vai retornar 401
        echo 401;
        die();
    }

    // Busca os dados que queremos
    $args = array(
        'post_type' => 'curso-evento',
        'p' => $_POST['idPost']
    );

    $wp_query = new WP_Query( $args );

    // Caso tenha os dados, retorna-os / Caso não tenha retorna 402 para tratarmos no frontend
    $vl = array();
    if( $wp_query->have_posts() ) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $vlTitle = get_the_title();
            $vlContent = get_the_content();
            $vl[] = array($vlTitle, $vlContent);
        }
        echo json_encode($vlContent);
    }
    else {
        echo 402;
    }
    exit;
}
/*
javascript
var dadosEnviar = {
    'select_post_nonce': js_global.select_post_nonce,
    'paged': 1,
    'action': 'select_post',
    'idPost': idPost
}
jQuery.ajax({
    url: js_global.xhr_url,
    type: 'POST',
    data: dadosEnviar,
    dataType: 'JSON',
    success: function(response) {

        if (response == 401){
            console.log('Requisição inválida');
            $('#show-content').html('Requisição inválida');
        }
        else if (response == 402) {
            console.log('Não há mais dados para mostrar');
            $('#show-content').html('Não há mais dados para mostrar');
        } else {
            console.log(response);
            $('#show-content').html(response);
        }
        $('#myModal').appendTo("body").modal('show');
    }
});
*/
?>