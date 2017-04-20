<?php 
/* MENU PRINCIPAL */
function menuRodape1() {
    register_nav_menu('rodape-1', __('Rodapé 1', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape1');
?>