<?php 
function registerSidebarRodape2() {
    $args = array(
        'name'          => 'Rodapé 2',
        'id'            => "rodape-widget-2",
        'description'   => '',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => "\n",
        'before_title'  => '',
        'after_title'   => "\n",
    );
    register_sidebar($args);
}
add_action('init', 'registerSidebarRodape2');
?>