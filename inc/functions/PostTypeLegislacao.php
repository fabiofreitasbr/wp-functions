<?php 
function postTypeLegislacao() {
    $labels = array(
        'name'               => _x( 'Legislação', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Legislação', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Legislação', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Legislação', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Legislação', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Legislação', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Legislação', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Legislação', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Legislação', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Legislação', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Legislação Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Legislação encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Legislação encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'legislacao' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail'),
        'taxonomies'         => array('legislacao')
    );
    register_post_type('legislacao', $args);
}
add_action('init', 'postTypeLegislacao');
