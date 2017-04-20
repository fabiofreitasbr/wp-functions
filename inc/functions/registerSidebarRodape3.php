<?php 
function registerSidebarRodape3() {
    $args = array(
        'name'          => 'Rodapé 3',
        'id'            => "rodape-widget-3",
        'description'   => '',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => "\n",
        'before_title'  => '',
        'after_title'   => "\n",
    );
    register_sidebar($args);
}
add_action('init', 'registerSidebarRodape3');
?>