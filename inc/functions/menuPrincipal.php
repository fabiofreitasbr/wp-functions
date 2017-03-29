<?php 
/* MENU PRINCIPAL */
function menuPrincipal() {
    register_nav_menu('primary', __('Menu Principal', 'theme-slug'));
}
add_action('after_setup_theme', 'menuPrincipal');
?>