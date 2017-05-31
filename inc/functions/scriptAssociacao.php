<?php 
/*

add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');

    // Add a new submenu under Tools:
    add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Asssociações','menu-test'), __('Asssociações','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

        // Add a submenu to the custom top-level menu:
        add_submenu_page('mt-top-level-handle', __('Test Sublevel','menu-test'), __('Test Sublevel','menu-test'), 'manage_options', 'sub-page', 'mt_sublevel_page');

        // Add a second submenu to the custom top-level menu:
        add_submenu_page('mt-top-level-handle', __('Test Sublevel 2','menu-test'), __('Test Sublevel 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
}

function mt_toplevel_page() {
    ?>

    <?php
}


function associeInsert( $dados )
{
    global $wpdb;
     
    $array = array();
    $array['nome'] = $dados['nome'];
    $array['email'] = $dados['email'];
     
    $format = array(); // possiveis formatos %s (string), %d (decimal) e %f (float).
    $format['nome'] = '%s';
    $format['email'] = '%s';
     
    $wpdb->insert( 'newsletter', $array , $format);
    // tabela, dados, formato.
 
}

function associeUpdate( $id , $dados  )
{
    global $wpdb;
     
    $array = array();
    $array['nome'] = $dados['nome'];
    $array['email'] = $dados['email'];
     
    $format = array(); // possiveis formatos %s (string), %d (decimal) e %f (float).
    $format['nome'] = '%s';
    $format['email'] = '%s';
     
    $where = array( 'ID' => $id );
    $where_format = array( 'ID' => '%d');
     
    $wpdb->update( 'newsletter', $array , $format, $where, $where_format );
    // tabela, dados, formato, onde, formato onde.
 
}

function associeDelete( $id ) {
    global $wpdb; 
    $wpdb->query("DELETE FROM 'newsletter' WHERE ID = $id");
}
*/
?>