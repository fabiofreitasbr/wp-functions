<?php 
// REGISTRAR OS WIDGETS DO RODAPÉ
class widgetRodape {
    public function principal() {

        function rodapeRegister1() {
            $args = array(
                'name'          => __( 'Widget Rodapé 1', 'theme_text_domain' ),
                'id'            => 'widget-rodape-1',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister1');

        function rodapeRegister2() {
            $args = array(
                'name'          => __( 'Widget Rodapé 2', 'theme_text_domain' ),
                'id'            => 'widget-rodape-2',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister2');

        function rodapeRegister3() {
            $args = array(
                'name'          => __( 'Widget Rodapé 3', 'theme_text_domain' ),
                'id'            => 'widget-rodape-3',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister3');

        function rodapeRegister4() {
            $args = array(
                'name'          => __( 'Widget Rodapé 4', 'theme_text_domain' ),
                'id'            => 'widget-rodape-4',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister4');

        function rodapeRegister5() {
            $args = array(
                'name'          => __( 'Widget Rodapé 5', 'theme_text_domain' ),
                'id'            => 'widget-rodape-5',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister5');

        function rodapeRegister6() {
            $args = array(
                'name'          => __( 'Widget Rodapé 6', 'theme_text_domain' ),
                'id'            => 'widget-rodape-6',
                'description'   => 'Região do rodapé onde ficam os links e elementos adicionados.',
                'class'         => '',
                'before_widget' => '<nav id="%1$s" class="widget-rodape-list %2$s">',
                'after_widget'  => '</nav>',
                'before_title'  => '<div class="title-footer-widget">',
                'after_title'   => '</div>'
            ); 
            register_sidebar($args);
        }
        add_action('widgets_init', 'rodapeRegister6');

    }
}
?>