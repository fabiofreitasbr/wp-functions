<?php 
function registrarSidebarBlog() {
    $args = array(
        'name'          => 'Blog Sidebar',
        'id'            => "blog-widget",
        'description'   => '',
        'class'         => 'list-unstyled',
        'before_widget' => '<article class="listagem"><div>',
        'after_widget'  => "</div></article>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    );
    register_sidebar($args);
}
add_action('init', 'registrarSidebarBlog');
?>