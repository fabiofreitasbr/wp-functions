<?php 
function produtosServicosTax() {
    $label = array(
        'name' => 'Produtos e Serviços (Categoria)',
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
        'produtoservicocat',
        'produto-servico',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'produto-e-servico' )
        )
    );
}
add_action('init',  'produtosServicosTax');

function postTypeProdutosServicos() {
    $labels = array(
        'name'               => _x( 'Produtos e Serviços', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Produto ou Serviço', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Produtos e Serviços', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Produtos e Serviços', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Produto ou Serviço', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Produto ou Serviço', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Produto ou Serviço', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Produto ou Serviço', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Produtos e Serviços', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Produtos e Serviços', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Produto ou Serviço Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Produto ou Serviço encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Produto ou Serviço encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'produtos-e-servicos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'with_front'         => false,
        'menu_position'      => 28,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('produtoservicocat')
    );
    register_post_type('produto-servico', $args);
    add_post_type_support( 'produto-servico', 'wps_subtitle' );
}
add_action('init', 'postTypeProdutosServicos');
