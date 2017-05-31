<?php /*
function publicacoesLegislacaoTax() {
    $label = array(
        'name' => 'Publicações e Legislação (Categoria)',
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
        'publiclesgcat',
        'public-lesg',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'publicacoes-e-legislacao' ),
        )
    );
}
add_action('init',  'publicacoesLegislacaoTax');

function postTypePublicacoesLesgilacao() {
    $labels = array(
        'name'               => _x( 'Publicações e Legislação', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Publicação e Lesgilação', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Publicações e Legislação', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Publicações e Legislação', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Publicações e Legislação', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Publicações e Legislação', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Publicações e Legislação', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Publicações e Legislação', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Publicações e Legislação', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Publicações e Legislação', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Publicações e Legislação Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Publicação e Lesgilação encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Publicação e Lesgilação encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'publicacoes-e-legislacao' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 33,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('publiclesgcat')
    );
    register_post_type('public-lesg', $args);
    add_post_type_support( 'public-lesg', 'wps_subtitle' );
}
add_action('init', 'postTypePublicacoesLesgilacao');

*/