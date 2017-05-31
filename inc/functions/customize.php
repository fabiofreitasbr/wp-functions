<?php 
// BLOCO PERSONALIZAR - ONDE USAR
 
// 

function detalhes_box_main( $wp_customize ) {
    /* -------------------------- LINKS RÁPIDOS -------------------------- */
    $wp_customize->add_panel( 'links_rapidos_painel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Destaques - Links Rápidos', 'flk'),
        'description'    => __('Blocos da Home - Links Rápidos', 'flk'),
    ));
    for ($h = 1; $h <= 4; $h++) {
        $wp_customize->add_section('box_links_rapidos_'.$h, array(
            'title'      => __($h.'º Destaque','flk'),
            'priority'   => 10,
            'panel'  => 'links_rapidos_painel'
        ));

        $wp_customize->add_setting( 'bloco_titulo_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloco_titulo_'.$h, array(
                'label'        => __( 'Título do Bloco '.$h, 'flk' ),
                'section'    => 'box_links_rapidos_'.$h,
                'settings'   => 'bloco_titulo_'.$h
            )));

        $wp_customize->add_setting( 'bloco_subtitulo_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));

            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloco_subtitulo_'.$h, array(
                'label'        => __( 'Subtítulo do Bloco '.$h, 'flk' ),
                'section'    => 'box_links_rapidos_'.$h,
                'settings'   => 'bloco_subtitulo_'.$h
            )));

        $wp_customize->add_setting( 'bloco_links_rapidos_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));

            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloco_links_rapidos_'.$h, array(
                'label'        => __( 'URL', 'flk' ),
                'section'    => 'box_links_rapidos_'.$h,
                'settings'   => 'bloco_links_rapidos_'.$h
            )));
    }

    /* -------------------------- SLIDE HOME -------------------------- */
    $wp_customize->add_panel( 'slide_home_painel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Slide Home', 'flk'),
        'description'    => __('Slides da Página inicial', 'flk'),
    ));
    for ($h = 1; $h <= 5; $h++) {
        $wp_customize->add_section('slide_home_'.$h, array(
            'title'      => __('Slide '.$h,'flk'),
            'priority'   => 10,
            'panel'  => 'slide_home_painel'
        ));
        $wp_customize->add_setting( 'slide_image_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control(
               new WP_Customize_Image_Control(
                   $wp_customize,
                   'slide_image_'.$h,
                   array(
                       'label'      => __( 'Imagem do Slide', 'flk' ),
                       'section'    => 'slide_home_'.$h,
                       'settings'   => 'slide_image_'.$h,
                       'context'    => 'your_setting_context' 
                   )
               )
           );
        $wp_customize->add_setting( 'slide_titulo_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slide_titulo_'.$h, array(
                'label'        => __( 'Título do Slide '.$h, 'flk' ),
                'section'    => 'slide_home_'.$h,
                'settings'   => 'slide_titulo_'.$h
            )));

        $wp_customize->add_setting( 'slide_subtitulo_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));

            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slide_subtitulo_'.$h, array(
                'label'        => __( 'Subtítulo do Slide '.$h, 'flk' ),
                'section'    => 'slide_home_'.$h,
                'settings'   => 'slide_subtitulo_'.$h
            )));
        $wp_customize->add_setting( 'slide_link_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));

            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slide_link_'.$h, array(
                'label'        => __( 'URL', 'flk' ),
                'section'    => 'slide_home_'.$h,
                'settings'   => 'slide_link_'.$h
            )));
    }

    /* -------------------------- REDES SOCIAIS -------------------------- */
    $wp_customize->add_panel( 'redes_sociais_painel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Redes Sociais', 'flk'),
        'description'    => __('Redes Sociais do site todo', 'flk'),
    ));
    $listSociais = array(
        array(
            'slug' => 'facebook',
            'titulo' => 'Facebook'
        ),
        array(
            'slug' => 'twitter',
            'titulo' => 'Twitter'
        ),
        array(
            'slug' => 'youtube',
            'titulo' => 'YouTube'
        ),
        array(
            'slug' => 'flickr',
            'titulo' => 'Flickr'
        )
    );
    foreach ($listSociais as $impSocial) {
        $wp_customize->add_section('social_lista_' . $impSocial['slug'], array(
            'title'      => __($impSocial['titulo'],'flk'),
            'priority'   => 10,
            'panel'  => 'redes_sociais_painel'
        ));

        $wp_customize->add_setting( 'link_social_' . $impSocial['slug'] , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'link_social_' . $impSocial['slug'], array(
                'label'         => __( 'URL do '.$impSocial['titulo'], 'flk' ),
                'section'       => 'social_lista_' . $impSocial['slug'],
                'settings'      => 'link_social_' . $impSocial['slug']
            )));
    }


    /* -------------------------- WIDGETS RÁPIDOS -------------------------- */
    $wp_customize->add_panel( 'links_rapidos_widget', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Links Rápidos Widget', 'flk'),
        'description'    => __('Links Rápidos Widget', 'flk'),
    ));
    for ($h = 1; $h <= 5; $h++) {
        $wp_customize->add_section('links_rapidos_section_' . $h, array(
            'title'      => __(''.$h.'º Link Rápido','flk'),
            'priority'   => 10,
            'panel'  => 'links_rapidos_widget'
        ));
        $wp_customize->add_setting( 'fast_widget_image_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control(
               new WP_Customize_Image_Control(
                   $wp_customize,
                   'fast_widget_image_'.$h,
                   array(
                       'label'      => __( 'Imagem do Link', 'flk' ),
                       'section'    => 'links_rapidos_section_' . $h,
                       'settings'   => 'fast_widget_image_'.$h,
                       'context'    => 'your_setting_context' 
                   )
               )
           );
        $wp_customize->add_setting( 'fast_widget_title_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fast_widget_title_'.$h, array(
                'label'        => __( 'Título do Link', 'flk' ),
                'section'    => 'links_rapidos_section_' . $h,
                'settings'   => 'fast_widget_title_'.$h
            )));
        $wp_customize->add_setting( 'fast_widget_description_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fast_widget_description_'.$h, array(
                'label'        => __( 'Descrição do Link', 'flk' ),
                'section'    => 'links_rapidos_section_' . $h,
                'settings'   => 'fast_widget_description_'.$h
            )));

        $wp_customize->add_setting( 'fast_widget_link_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fast_widget_link_'.$h, array(
                'label'        => __( 'URL', 'flk' ),
                'section'    => 'links_rapidos_section_' . $h,
                'settings'   => 'fast_widget_link_'.$h
            )));
    }

    /* -------------------------- NOTÍCIAS DESTAQUES -------------------------- */
    $wp_customize->add_panel( 'destaques_conteudos_widget', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Destaques de Conteúdos', 'flk'),
        'description'    => __('Destaques de Conteúdos', 'flk'),
    ));

    $wp_customize->add_section('eventos_destaque_section', array(
            'title'      => __('Eventos em Destaque','flk'),
            'priority'   => 10,
            'panel'  => 'destaques_conteudos_widget'
        ));
    for ($h = 1; $h <= 4; $h++) {
        $wp_customize->add_setting( 'eventos_destaque_post_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new Destaques_Conteudos_Custom_Control( $wp_customize, 'eventos_destaque_post_'.$h, array(
                'label'         => __( 'Destaque '.$n, 'flk' ),
                'section'       => 'eventos_destaque_section',
                'settings'      => 'eventos_destaque_post_'.$h,
                'post_type'     => 'curso-evento',
                'taxonomy'      => 'cursoseventoscat',
                'category'      => 150
            )));
    }

        $wp_customize->add_section('noticias_destaque_section', array(
            'title'      => __('Notícias Gerais (Destaques)','flk'),
            'priority'   => 10,
            'panel'  => 'destaques_conteudos_widget'
        ));
    for ($h = 1; $h <= 5; $h++) {
        $wp_customize->add_setting( 'noticias_destaque_post_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new Destaques_Conteudos_Custom_Control( $wp_customize, 'noticias_destaque_post_'.$h, array(
                'label'         => __( 'Destaque '.$h, 'flk' ),
                'section'       => 'noticias_destaque_section',
                'settings'      => 'noticias_destaque_post_'.$h,
                'post_type'     => 'notic-comunic',
                'taxonomy'      => 'noticcomuniccat',
                'category'      => 151
            )));
    }
        $wp_customize->add_section('noticias_setor_section', array(
            'title'      => __('Notícias do Congresso (Destaques)','flk'),
            'priority'   => 10,
            'panel'  => 'destaques_conteudos_widget'
        ));
    for ($h = 1; $h <= 5; $h++) {
        $wp_customize->add_setting( 'noticias_setor_post_'.$h , array(
            'default'     => '',
            'transport'   => 'refresh'
        ));
            $wp_customize->add_control( new Destaques_Conteudos_Custom_Control( $wp_customize, 'noticias_setor_post_'.$h, array(
                'label'         => __( 'Destaque '.$h, 'flk' ),
                'section'       => 'noticias_setor_section',
                'settings'      => 'noticias_setor_post_'.$h,
                'post_type'     => 'notic-comunic',
                'taxonomy'      => 'noticcomuniccat',
                'category'      => 152
            )));
    }
}
add_action('customize_register', 'detalhes_box_main');
?>