<?php 
function registerSidebarRodape1() {
    $args = array(
        'name'          => 'Rodapé 1',
        'id'            => "rodape-widget-1",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<ul class="nav navbar-nav">',
        'after_widget'  => "</ul>\n",
        'before_title'  => '',
        'after_title'   => "\n",
    );
    register_sidebar($args);
}
add_action('init', 'registerSidebarRodape1');
?>