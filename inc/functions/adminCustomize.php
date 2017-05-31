<?php
 // Alterar o os dados do rodapé
function alt_admin_footer ()
{
    echo '<span id="footer-thankyou">Desenvolvido por <strong>Agência Campana</strong></span>';
}
add_filter('admin_footer_text', 'alt_admin_footer');

// Mudar Logo do Wordpress
function meu_logo_login()
{
    echo '<style  type="text/css"> h1 a {  background-image:url('.get_bloginfo('template_directory').'/images/logo.jpg)  !important; background-size: contain !important; width: 234px !important;} </style>';
}
add_action('login_head',  'meu_logo_login');

// Remover Logo do Canto
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) { 
    $wp_admin_bar->remove_node( 'wp-logo' );
}


// Exibir Mensagens no Wordpress
function showMessage($message, $errormsg = false)
{
    if ($errormsg) {
        echo '<div id="message" class="error">';
    }
    else {
        echo '<div id="message" class="updated fade">';
    }
    echo "<p><strong>$message</strong></p></div>";
} 
 
function showAdminMessages()
{
    showMessage("Esta é uma versão de homologação.", true);
}
add_action('admin_notices', 'showAdminMessages');

// Remover editor de códigos do painel
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
 
add_action('_admin_menu', 'remove_editor_menu', 1);

// Remover Versão
function change_footer_version() {
  return get_bloginfo("title") . ' - ' . get_bloginfo("description");
}
add_filter( 'update_footer', 'change_footer_version', 9999 );

// Remover Opções de Tela Wordpress
add_action('wp_dashboard_setup', 'wpmidia_remove_dashboard_widgets' );
function wpmidia_remove_dashboard_widgets() {
 
        global $wp_meta_boxes;
 
        // Remove o widget "Links de entrada" (Incomming links)
        // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);        
        // remove o widget "Plugins"
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);        
        // remove o widget "Rascunhos recentes" (Recent drafts)
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
        // remove o widget "QuickPress"
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
 
        // remove o widget "Agora" (Right now)
        // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        // remove o widget "Blog do WordPress" (Primary)
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        // remove o widget "Outras notícias do WordPress" (Secondary)
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);              
}

// Escondendo as atualizações
add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}

// Remover mensagem de bem-vindo
remove_action('welcome_panel', 'wp_welcome_panel');