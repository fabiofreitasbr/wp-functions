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
    $head->css('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', false);
    $head->css('all.min');
    $head->css('brands.min');
    $head->css('regular.min');
    $head->css('solid.min');
    $head->css('svg-with-js.min');
    $head->css('v4-shims.min');
    $head->css('bootstrap.min');
    $head->css('style');
    ?>
    <!-- JS -->
    <?php
    $head->js('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false);
    $head->js('bootstrap.min');
    $head->js('functions');
    wp_head();
    ?>
    <script type="text/javascript">
        var themeAdress = "<?php echo bloginfo('template_url'); ?>";
    </script>
</head>
<body>
