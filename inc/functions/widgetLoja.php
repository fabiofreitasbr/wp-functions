<?php 
// REGISTRAR OS WIDGETS DO RODAPÉ
class registrarLoja {
    public function principal() {
        function lojaRegister1() {
            $args = array(
                'name'          => __( 'Widget Loja 1', 'theme_text_domain' ),
                'id'            => 'widget-loja',
                'description'   => 'Região da loja onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-Loja-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-loja-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'lojaRegister1');
    }
}
// Refeição
?>