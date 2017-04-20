<?php 
function registrarSidebarBlogCategory() {
    $args = array(
        'name'          => 'Blog Sidebar (Interno)',
        'id'            => "blog-widget-category",
        'description'   => '',
        'class'         => 'list-unstyled',
        'before_widget' => '<article class="listagem">',
        'after_widget'  => "</article>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    );
    register_sidebar($args);
}
add_action('init', 'registrarSidebarBlogCategory');
?>