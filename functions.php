<?php 
require 'inc/load.php';

/* CARREGAR LOGO */
$carregarLogo = new carregarLogo();
$carregarLogo->principal();

/* REGISTRAR MENU */
$registrarMenus = new registrarMenus();
$registrarMenus->principal();

/* REGISTRAR WIDGET */
$widgetRodape = new widgetRodape();
$widgetRodape->principal();

?>