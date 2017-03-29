<?php 
/* CARREGAR FUNÇÃO LOGO */
class carregarLogo {
    public function principal() {
        add_theme_support( 'custom-logo', array(
            'height'      => 158,
            'width'       => 385,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
    }
}
?>