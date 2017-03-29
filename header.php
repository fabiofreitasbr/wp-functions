<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <title><?php wp_title('-'); ?></title>
    <!-- META -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="<?php bloginfo('title'); ?>, <?php bloginfo('description'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <?php
    $head = new headFunctions();
    $head->css('bootstrap');
    $head->css('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Sans:400,400i,700,700i', false);
    $head->css('font-awesome');
    $head->css('font-awesome');
    $head->css('unslider');
    $head->css(get_bloginfo('stylesheet_url'), false);
    ?>
    <!-- JS -->
    <?php
    $head->js('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false);
    $head->js('bootstrap');
    $head->js('unslider');
    $head->js('functions');
    wp_head();
    ?>
    <script type="text/javascript">
        var themeAdress = "<?php echo bloginfo('template_url'); ?>";
    </script>
</head>
<body>  

    <div class="nav-mobile">
        <?php echo wp_nav_menu(array('theme_location' => 'second', 'item_spacing' => 'discard')); ?>
        <?php echo wp_nav_menu(array('theme_location' => 'primary', 'item_spacing' => 'discard')); ?>
     </div>
    <script>
        $(document).ready(function(){
          // MENU ROLO
            $('.btn-menu').on('click touchstart', function(e){
                $('html').toggleClass('active-menu');
                e.preventDefault();
            });

            $('.btn-search , .close').on('click touchstart', function(e){
                $('html').toggleClass('active-search');
                e.preventDefault();
            });

            $('.menu-item-has-children').on('click touchstart', function(){
                $(this).children('.sub-menu').toggleClass('active-menu');
            });
        });
    </script>

    <style>
        .btn-box-menu, .btn-box-search {
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-box-menu i, .btn-box-search i{
            font-size: 1.5em;
            cursor: pointer;
        }
    </style>
    <div class="total">
        <header>
            <div class="container header_box">
                <div class="row">
                    <div class="hidden-lg hidden-md col-sm-1 col-xs-2 btn-box-menu"><i class="fa fa-bars btn-menu" aria-hidden="true"></i></div>
                    <div class="logo col-lg-5 col-md-5 col-sm-10 col-xs-8">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $urlLogo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        ?>
                        <a href="<?php bloginfo('home') ?>">
                            <img src="<?php echo $urlLogo[0]; ?>" style="width: 320px; margin-top: 15px;">
                        </a>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-1 col-xs-2 btn-box-search"><i class="fa fa-search btn-search" aria-hidden="true"></i></div>
                    
                    <div class="box hidden-lg hidden-md">
                        <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
                        <div class="header-search">
                            <form action="<?php bloginfo('home'); ?>" method="GET">
                                <input type="text" name="s" id="s" placeholder="BUSCAR NO SITE" class="input-search">
                                <label for="s"><i class="fa fa-search icon-search"></i></label>
                            </form>
                        </div>
                    </div> 
                    <div class="col-md-7">
                        <nav class="menu-second">
                            <?php echo wp_nav_menu(array('theme_location' => 'second', 'item_spacing' => 'discard')); ?>
                        </nav>
                        <div class="aside-header">
                            <div class="col-md-5 col-lg-5 col-sm-1 col-lg-offset-1">
                                <div class="header-search">
                                    <form action="<?php bloginfo('home'); ?>" method="GET">
                                        <input type="text" name="s" id="s" placeholder="BUSCAR NO SITE" class="input-search">
                                        <label for="s"><i class="fa fa-search icon-search"></i></label>
                                    </form>
                                </div>
                            </div>
                            <div class="size-text col-md-2 col-lg-2 col-sm-2 text-center">
                                <span class="increase-text">A+</span>
                                <span class="separator-vertical">|</span>
                                <span class="decrease-text">a-</span>
                            </div>
                            <div class="social-links col-md-5 col-lg-4 col-sm-4 text-center">
                                <div class="social-icon social-facebook"><i class="fa fa-facebook"></i></div>
                                <div class="social-icon social-twitter"><i class="fa fa-twitter"></i></div>
                                <div class="social-icon social-youtube"><i class="fa fa-youtube"></i></div>
                                <div class="social-icon social-flickr"><i class="fa fa-flickr"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav class="main-menu">
            <div class="container">
                <?php echo wp_nav_menu(array('theme_location' => 'primary', 'item_spacing' => 'discard')); ?>
            </div>
        </nav>
        <?php 
        if (is_home() || is_front_page()) {
            get_template_part('inc/element/part', 'slide');
        }
        else {
            get_template_part('inc/element/part', 'header');
        }
        ?>