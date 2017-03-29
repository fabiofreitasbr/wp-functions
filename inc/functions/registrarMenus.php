<?php 
/* CARREGAR FUNÇÃO LOGO */
class registrarMenus {
    public function principal() {
        /* MENU PRINCIPAL */
        function menuPrincipal() {
            register_nav_menu('primary', __('Menu Principal', 'theme-slug'));
        }
        add_action('after_setup_theme', 'menuPrincipal');

        /* MENU SECUNDÁRIO */
        function menuSecundario() {
            register_nav_menu('second', __('Segundo Menu', 'theme-slug'));
        }
        add_action('after_setup_theme', 'menuSecundario');
    }
}
?>