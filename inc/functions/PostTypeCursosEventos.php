<?php 
function cursosEventosTax() {
    $label = array(
        'name' => 'Cursos e Eventos (Categoria)',
        'singular_name' => 'Categoria',
        'menu_name' => 'Categorias',
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
        'cursoseventoscat',
        'curso-evento',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'cursos-e-eventos' )
        )
    );
}
add_action('init',  'cursosEventosTax');

function cursosEventosTipo() {
    $label = array(
        'name' => 'Tipo',
        'singular_name' => 'Tipo',
        'menu_name' => 'Tipos',
        'all_items' => 'Todos os Tipos',
        'edit_item' => 'Editar Tipo',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Tipo Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'cursoseventostipo',
        'curso-evento',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => false,
            'rewrite' => array( 'slug' => 'cursos-eventos-tipo' ),
        )
    );
}
add_action('init',  'cursosEventosTipo');

function postTypeCursosEventos() {
    $labels = array(
        'name'               => _x( 'Cursos e Eventos', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Cursos e Evento', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Cursos e Eventos', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Cursos e Eventos', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Cursos e Eventos', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Cursos e Eventos', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Cursos e Eventos', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Cursos e Eventos', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Cursos e Eventos', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Cursos e Eventos', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Cursos e Eventos Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Curso e Evento encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Curso e Evento encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cursos-e-eventos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 29,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('cursoseventoscat', 'cursoseventostipo')
    );
    register_post_type('curso-evento', $args);
    add_post_type_support( 'curso-evento', 'wps_subtitle' );
}
add_action('init', 'postTypeCursosEventos');
