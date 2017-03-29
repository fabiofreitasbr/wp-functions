<?php 
function registerSidebarInstitucional() {
    $args = array(
        'name'          => 'Institucional Widget',
        'id'            => "institucional-widget",
        'description'   => '',
        'class'         => 'list-unstyled',
        'before_widget' => '<div class="sidebar-inst">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    );
    register_sidebar($args);
}
add_action('init', 'registerSidebarInstitucional');
?>