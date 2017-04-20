<?php 
/* MENU PRINCIPAL */
function menuRodape3() {
    register_nav_menu('rodape-3', __('Rodapé 3', 'theme-slug'));
}
add_action('after_setup_theme', 'menuRodape3');
?>