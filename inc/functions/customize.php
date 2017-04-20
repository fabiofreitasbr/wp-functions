<?php
// BLOCO PERSONALIZAR - ONDE USAR
function detalhes_box_main( $wp_customize ) {
    $wp_customize->add_section('detalhes_box_main_content', array(
        'title'      => __('Entrega e Personalização','mytheme'),
        'priority'   => 10
    ));
        // TÍTULOS
        $wp_customize->add_setting( 'bloco_titulo' , array(
            'default'     => 'NOSSOS SERVIÇOS',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloco_titulo', array(
                'label'        => __( 'Título do Bloco', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'bloco_titulo'
            )));
        $wp_customize->add_setting( 'bloco_subtitulo' , array(
            'default'     => 'Conheça os nosso produtos e veja como podemos te atender.',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloco_subtitulo', array(
                'label'        => __( 'Subtítulo do Bloco', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'bloco_subtitulo'
            )));
        // PERSONALIZAÇÃO
        $wp_customize->add_setting( 'personalizacao_titulo' , array(
            'default'     => 'PERSONALIZAÇÃO',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'personalizacao_titulo', array(
                'label'        => __( 'Título da Personalização', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'personalizacao_titulo'
            )));
        $wp_customize->add_setting( 'personalizacao_conteudo' , array(
            'default'     => 'Transforme o seu produto PasseVIP uma excelente mídia de <strong>ativação de marca.</strong>',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'personalizacao_conteudo', array(
                'label'        => __( 'Conteúdo da Personalização', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'personalizacao_conteudo'
            )));
        // ENTREGA
        $wp_customize->add_setting( 'entrega_titulo' , array(
            'default'     => 'ENTREGA EM TODO O BRASIL',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'entrega_titulo', array(
                'label'        => __( 'Título da Personalização', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'entrega_titulo'
            )));
        $wp_customize->add_setting( 'entrega_conteudo' , array(
            'default'     => 'Nosso serviço de entrega é prático, ágil e conveniente.',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'entrega_conteudo', array(
                'label'        => __( 'Conteúdo da Personalização', 'mytheme' ),
                'section'    => 'detalhes_box_main_content',
                'settings'   => 'entrega_conteudo'
            )));
}
add_action('customize_register', 'detalhes_box_main');
?>