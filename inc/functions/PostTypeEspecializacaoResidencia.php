<?php 
function especializacaoResidenciaTax() {
    $label = array(
        'name' => 'Especialização e Residência (Categoria)',
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
        'especiresicat',
        'especi-resi',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'especializacao-e-residencia' )
        )
    );
}
add_action('init',  'especializacaoResidenciaTax');

function postTypeEspecializacaoResidencia() {
    $labels = array(
        'name'               => _x( 'Especialização e Residência', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Especialização e Residência', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Especialização e Residências', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Especialização e Residências', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Especialização e Residências', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Especialização e Residências', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Especialização e Residências', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Especialização e Residências', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Especialização e Residências', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Especialização e Residências', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Especialização e Residências Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Especialização e Residência encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Especialização e Residência encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'especializacao-e-residencia' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'with_front'         => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('especiresicat')
    );
    register_post_type('especi-resi', $args);
    add_post_type_support( 'especi-resi', 'wps_subtitle' );
}
add_action('init', 'postTypeEspecializacaoResidencia');
?>