<?php 
function postTypeJurisprudencia() {
    $labels = array(
        'name'               => _x( 'Jurisprudência', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Jurisprudência', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Jurisprudência', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Jurisprudência', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Jurisprudência', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Jurisprudência', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Jurisprudência', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Jurisprudência', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Jurisprudência', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Jurisprudência', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Jurisprudência Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Jurisprudência encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Jurisprudência encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'jurisprudencia' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail'),
        'taxonomies'         => array('jurisprudencia')
    );
    register_post_type('jurisprudencia', $args);
}
add_action('init', 'postTypeJurisprudencia');
