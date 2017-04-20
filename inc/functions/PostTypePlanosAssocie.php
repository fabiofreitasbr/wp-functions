<?php 
function associeseTax() {
    $label = array(
        'name' => 'Plano (Categoria)',
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
        'associesecat',
        'associese',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'associe-se' ),
        )
    );
}
add_action('init',  'associeseTax');

function postTypeAssociese() {
    $labels = array(
        'name'               => _x( 'Planos', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Plano', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Planos', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Planos', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Plano', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Plano', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Plano', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Plano', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Plano', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Planos', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Plano Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum tipo de plano encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum tipo de plano encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'associe-se' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 34,
        'menu_icon'          => 'dashicons-feedback',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('associesecat')
    );
    register_post_type('associese', $args);
    add_post_type_support( 'associese', 'wps_subtitle' );
}
add_action('init', 'postTypeAssociese');
