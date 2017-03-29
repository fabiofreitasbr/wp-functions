<?php 
$adressTheme = get_bloginfo('template_url');
$templateDirectory = get_template_directory();
foreach (glob($templateDirectory . "/inc/functions/*.php") as $filename) { 
    require $filename; 
}
?>