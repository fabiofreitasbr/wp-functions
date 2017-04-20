<?php 
/* MENU PRINCIPAL */
function menuRodape2() {
    register_nav_menu('rodape-2', __('Rodapé 2', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape2');
?>