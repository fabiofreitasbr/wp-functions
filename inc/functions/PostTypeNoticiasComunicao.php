<?php 
function noticiasComunicacoesTax() {
    $label = array(
        'name' => 'Notícias e Comunicação (Categoria)',
        'singular_name' => 'Categoria',
        'menu_name' => 'Categorias',
        'all_items' => 'Todas as Tipos',
        'edit_item' => 'Editar Categoria',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Categoria Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'noticcomuniccat',
        'notic-comunic',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'noticia-e-comunicacao' ),
        )
    );
}
add_action('init',  'noticiasComunicacoesTax');

function noticiasTag() {
    $label = array(
        'name' => 'Tags - Notícias',
        'singular_name' => 'Tag',
        'menu_name' => 'Tags (Notícias)',
        'all_items' => 'Todas as Tags',
        'edit_item' => 'Editar Tag',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Tag Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'noticias-tag',
        'notic-comunic',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'noticia-tag' ),
            '_builtin' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_post_tags',
                'edit_terms'   => 'edit_post_tags',
                'delete_terms' => 'delete_post_tags',
                'assign_terms' => 'assign_post_tags',
            ),
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );
}
add_action('init',  'noticiasTag');

function classificaoSalaImprensa() {
    $label = array(
        'name' => 'Classificações - Sala de Imprensa',
        'singular_name' => 'Classificação',
        'menu_name' => 'Classificações (Sala de Imprensa)',
        'all_items' => 'Todas as Classificações',
        'edit_item' => 'Editar Classificação',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Tag Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'classificao-imprensa',
        'notic-comunic',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'noticias-e-comunicacao/classificacao' ),
            '_builtin' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_post_tags',
                'edit_terms'   => 'edit_post_tags',
                'delete_terms' => 'delete_post_tags',
                'assign_terms' => 'assign_post_tags',
            ),
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );
}
add_action('init',  'classificaoSalaImprensa');

function postTypeNoticiasComunicacoes() {

    $labels = array(
        'name'               => _x( 'Notícias e Comunicação', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Notícia ou Comunicação', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Notícias e Comunicação', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Notícias e Comunicação', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Notícias e Comunicação', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Notícias e Comunicação', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Notícias e Comunicação', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Notícias e Comunicação', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Notícias e Comunicação', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Notícias e Comunicação', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Notícias e Comunicação Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Notícia ou Comunicação encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Notícia ou Comunicação encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'noticias-e-comunicacao' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'with_front'         => false,
        'menu_position'      => 32,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('noticcomuniccat', 'noticias-tag')
    );

    register_post_type('notic-comunic', $args);
    add_post_type_support( 'notic-comunic', 'wps_subtitle' );
}
add_action('init', 'postTypeNoticiasComunicacoes');

