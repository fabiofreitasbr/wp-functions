<?php 
function postTypeTorneios () {
    $labels = array(
        'name'               => _x( 'Torneios', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Torneios', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Torneios', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Torneios', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Torneios', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Torneios', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Torneios', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Torneios', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Torneios', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Torneios', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Torneios Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Torneios encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Torneios encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tournaments' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('torneios'),
        'menu_icon'          => 'dashicons-image-filter'
    );
    register_post_type('torneios', $args);
    add_post_type_support( 'torneios', 'wps_subtitle' );
}
add_action('init', 'postTypeTorneios');

function torneiosTax() {
    $label = array(
        'name' => 'Categorias',
        'singular_name' => 'Categoria',
        'menu_name' => 'Categoria',
        'all_items' => 'Todas as Categorias',
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
        'torneios',
        'torneios',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'tournament')
        )
    );
}
add_action('init',  'torneiosTax');