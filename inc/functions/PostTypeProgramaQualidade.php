<?php 
function programaQualidadeTax() {
    $label = array(
        'name' => 'Programas da Qualidade (Categoria)',
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
        'programqualicat',
        'programa-qualidade',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'programa-da-qualidade' )
        )
    );
}
add_action('init',  'programaQualidadeTax');

function laboratoriosEstado() {
    $label = array(
        'name' => 'Labotatórios - Estado',
        'singular_name' => 'Estado',
        'menu_name' => 'Estados (Labotatórios)',
        'all_items' => 'Todos os Estados',
        'edit_item' => 'Editar Estado',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Estado',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'laboratorios-estado',
        'programa-qualidade',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'laboratorios-estado')
        )
    );
}
add_action('init',  'laboratoriosEstado');

function auditoresEstado() {
    $label = array(
        'name' => 'Auditores - Estado',
        'singular_name' => 'Estado',
        'menu_name' => 'Estados (Auditores)',
        'all_items' => 'Todos os Estados',
        'edit_item' => 'Editar Estado',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Estado',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'auditores-estado',
        'programa-qualidade',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'auditores-estado')
        )
    );
}
add_action('init',  'auditoresEstado');



function postTypeProgramQualidade() {
    $labels = array(
        'name'               => _x( 'Programas da Qualidade', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Programa da Qualidade', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Programas da Qualidade', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Programas da Qualidade', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Programas da Qualidade', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Programas da Qualidade', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Programas da Qualidade', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Programas da Qualidade', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Programas da Qualidade', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Programas da Qualidade', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Programas da Qualidade Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Programa da Qualidade encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Programa da Qualidade encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'programas-da-qualidade' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'with_front'         => false,
        'menu_position'      => 31,
        'menu_icon'          => 'dashicons-chart-bar',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('programqualicat', 'laboratorios-estado')
    );
    register_post_type('programa-qualidade', $args);
    add_post_type_support( 'programa-qualidade', 'wps_subtitle' );
}
add_action('init', 'postTypeProgramQualidade');