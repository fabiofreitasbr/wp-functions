<?php 
function postTypeRevista () {
    $labels = array(
        'name'               => _x( 'Revista', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Revista', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Revista', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Revista', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Revista', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Revista', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Revista', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Revista', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Revista', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Revista', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Revista Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Revista encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Revista encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'revista' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail'),
        'taxonomies'         => array('revista')
    );
    register_post_type('revista', $args);
}
add_action('init', 'postTypeRevista');

