<?php 
/* MENU PRINCIPAL */
function wpNavMenu() {
    wp_nav_menu( 
    	array( 
    		'theme_location' => 'principal', 
    		'container_class' => 'my_extra_menu_class' 
    	)
    );
}
add_action('after_setup_theme', 'menuPrincipal');
?>