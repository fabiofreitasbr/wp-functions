<?php 
function registerSidebarRodape4() {
    $args = array(
        'name'          => 'Rodapé 4',
        'id'            => "rodape-widget-4",
        'description'   => '',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => "\n",
        'before_title'  => '',
        'after_title'   => "\n",
    );
    register_sidebar($args);
}
add_action('init', 'registerSidebarRodape4');
?>