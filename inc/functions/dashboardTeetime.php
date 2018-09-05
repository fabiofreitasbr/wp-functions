<?php 
date_default_timezone_set('Brazil/East');
add_action('admin_head', 'teetime_booking_style');

function teetime_booking_style() {
    ?>
    <style type="text/css">
    .teetime-booking-view { font-size: 18px}
    .table-teetime-booking { box-sizing: border-box; width: 100%; }
    table.table-teetime-booking tr td { padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word; word-break: break-word; }
    table.table-teetime-booking tr td:first-child { background-color: #757513; color: #efefef; width: 120px !important; text-align: right; vertical-align: top; }
    .teetime-booking.row { display: flex; flex-flow: row wrap; } 
    .teetime-column.col-1 { width: 10%; }
    .teetime-column.col-2 { width: 20%; }
    .teetime-column.col-3 { width: 30%; }
    .teetime-column.col-4 { width: 40%; }
    .teetime-column.col-5 { width: 50%; }
    .teetime-column.col-6 { width: 60%; }
    .teetime-column.col-7 { width: 70%; }
    .teetime-column.col-8 { width: 80%; }
    .teetime-column.col-9 { width: 90%; }
    .teetime-column.col-10 { width: 100%; }
    .reservas-diarias td, .reservas-diarias th { text-align: center; }
    .reservas-diarias td { border: solid 1px #dedede; }
    .detail-single-calendar { display: none; position: absolute; text-align: left; background-color: white; padding: 6px 16px; box-shadow: 0px 0px 4px #c7c7c7; }
    .box-calendar-detail:hover .detail-single-calendar { display: block; }
    @media print { 
        body * { visibility: hidden; } 
        #wpbody-content #message, #wpbody-content #message * { visibility: hidden !important; } 
        #wpbody-content, #wpbody-content * { visibility: visible !important; }
        #wpbody-content { position: fixed; left: 0; top: 0; }
    }
    .calendar td{border:1px solid #ddd; width:14.2%; height: 100px;}
    .calendar th{text-align:center; text-transform:uppercase;}
    .calendar a.wrap_horario{display:block; cursor:help; margin:0 0 5px; padding:5px; position:relative;}
    .calendar a.wrap_horario .jogadores{background:#000; border-radius:4px; display:none; left:0; padding:5px 10px; position:absolute; text-align:left; top:20px; z-index:99;}
    .calendar a:hover.wrap_horario .jogadores{display:block; line-height:18px}
    .calendar .dia{font-size:18px; font-weight:bold;}
    .calendar .hoje{background:#dedede;}

    .calendario_topo{margin:0 0 35px; position:relative; text-align:center;}
    .calendario_topo .next, .calendario_topo .prev {-webkit-background-size: cover; background-size: cover; background-position: center; background-repeat: no-repeat; display:block; height:53px; overflow:hidden; text-indent:-99999px; position:absolute; top:0; width: 18px; height: 31px;}
    .calendario_topo .next{background-image: url(<?php bloginfo('template_url'); ?>/img/adm_next.png); right:0;}
    .calendario_topo .prev{background-image: url(<?php bloginfo('template_url'); ?>/img/adm_prev.png); left:0;}
    .calendario_topo h2{color:#5e5e5e; font-size:35px; font-weight:bold; padding:5px 0 0; text-transform:uppercase;}

    .table { width: 100%; margin-bottom: 1rem; background-color: transparent; box-sizing: border-box; border-spacing: 0px !important; }
    .table th{background:#333; color:#fff; }
    .table th, .table td { padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6; margin: 0px; outline: 0px;}
    .table thead th { vertical-align: bottom; border-bottom: 2px solid #dee2e6; }
    .table tbody + tbody { border-top: 2px solid #dee2e6; }
    .table .table { background-color: #fff; }

    .table-sm th, .table-sm td { padding: 0.3rem; }
    .table-bordered { border: 1px solid #dee2e6; }
    .table-bordered th, .table-bordered td { border: 1px solid #dee2e6; }
    .table-bordered thead th, .table-bordered thead td { border-bottom-width: 2px; }
    .table-borderless th, .table-borderless td, .table-borderless thead th, .table-borderless tbody + tbody { border: 0; }
    .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(0, 0, 0, 0.05); }

    .table-hover tbody tr:hover { background-color: rgba(0, 0, 0, 0.075); }

    .table-primary, .table-primary > th, .table-primary > td { background-color: #b8daff; }
    .table-hover .table-primary:hover { background-color: #9fcdff; }
    .table-hover .table-primary:hover > td, .table-hover .table-primary:hover > th { background-color: #9fcdff; }

    .table-secondary, .table-secondary > th, .table-secondary > td { background-color: #d6d8db; }
    .table-hover .table-secondary:hover { background-color: #c8cbcf; }
    .table-hover .table-secondary:hover > td, .table-hover .table-secondary:hover > th { background-color: #c8cbcf; }

    .table-success, .table-success > th, .table-success > td { background-color: #c3e6cb; } 
    .table-hover .table-success:hover { background-color: #b1dfbb; } 
    .table-hover .table-success:hover > td, .table-hover .table-success:hover > th { background-color: #b1dfbb; } 

    .table-info, .table-info > th, .table-info > td { background-color: #bee5eb; } 
    .table-hover .table-info:hover { background-color: #abdde5; } 
    .table-hover .table-info:hover > td, .table-hover .table-info:hover > th { background-color: #abdde5; } 

    .table-warning, .table-warning > th, .table-warning > td { background-color: #ffeeba; } 
    .table-hover .table-warning:hover { background-color: #ffe8a1; } 
    .table-hover .table-warning:hover > td, .table-hover .table-warning:hover > th { background-color: #ffe8a1; }

    .table-danger, .table-danger > th, .table-danger > td { background-color: #f5c6cb; } 
    .table-hover .table-danger:hover { background-color: #f1b0b7; } 
    .table-hover .table-danger:hover > td, .table-hover .table-danger:hover > th { background-color: #f1b0b7; } 

    .table-light, .table-light > th, .table-light > td { background-color: #fdfdfe; } 
    .table-hover .table-light:hover { background-color: #ececf6; } 
    .table-hover .table-light:hover > td, .table-hover .table-light:hover > th { background-color: #ececf6; } 

    .table-dark, .table-dark > th, .table-dark > td { background-color: #c6c8ca; } 
    .table-hover .table-dark:hover { background-color: #b9bbbe; } 
    .table-hover .table-dark:hover > td, .table-hover .table-dark:hover > th { background-color: #b9bbbe; } 

    .table-active, .table-active > th, .table-active > td { background-color: rgba(0, 0, 0, 0.075); } 
    .table-hover .table-active:hover { background-color: rgba(0, 0, 0, 0.075); } 
    .table-hover .table-active:hover > td, .table-hover .table-active:hover > th { background-color: rgba(0, 0, 0, 0.075); } 
    
    .table .thead-dark th { color: #fff; background-color: #212529; border-color: #32383e; } 
    .table .thead-light th { color: #495057; background-color: #e9ecef; border-color: #dee2e6; } 
    .table-dark { color: #fff; background-color: #212529; } 
    .table-dark th, .table-dark td, .table-dark thead th { border-color: #32383e; } 
    .table-dark.table-bordered { border: 0; } 
    .table-dark.table-striped tbody tr:nth-of-type(odd) { background-color: rgba(255, 255, 255, 0.05); } 
    .table-dark.table-hover tbody tr:hover { background-color: rgba(255, 255, 255, 0.075); }

    @media (max-width: 575.98px) { 
        .table-responsive-sm { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; } 
        .table-responsive-sm > .table-bordered { border: 0; }
    } 
    @media (max-width: 767.98px) { 
        .table-responsive-md { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; } 
        .table-responsive-md > .table-bordered { border: 0; }
    }
    @media (max-width: 991.98px) { 
        .table-responsive-lg { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; } 
        .table-responsive-lg > .table-bordered { border: 0; } 
    } 
    @media (max-width: 1199.98px) { 
        .table-responsive-xl { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; } 
        .table-responsive-xl > .table-bordered { border: 0; }
    } 
    .table-responsive { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive > .table-bordered { border: 0; }
    .panel > .table,
    .panel > .table-responsive > .table,
    .panel > .panel-collapse > .table {
      margin-bottom: 0;
    }
    .panel > .table caption,
    .panel > .table-responsive > .table caption,
    .panel > .panel-collapse > .table caption {
      padding-left: 15px;
      padding-right: 15px;
    }
    .panel > .panel-body + .table,
    .panel > .panel-body + .table-responsive,
    .panel > .table + .panel-body,
    .panel > .table-responsive + .panel-body {
      border-top: 1px solid #dddddd;
    }
    .panel > .table > tbody:first-child > tr:first-child th,
    .panel > .table > tbody:first-child > tr:first-child td {
      border-top: 0;
    }
    .panel > .table-bordered,
    .panel > .table-responsive > .table-bordered {
      border: 0;
    }
    .panel > .table-bordered > thead > tr > th:first-child,
    .panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
    .panel > .table-bordered > tbody > tr > th:first-child,
    .panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
    .panel > .table-bordered > tfoot > tr > th:first-child,
    .panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
    .panel > .table-bordered > thead > tr > td:first-child,
    .panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
    .panel > .table-bordered > tbody > tr > td:first-child,
    .panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
    .panel > .table-bordered > tfoot > tr > td:first-child,
    .panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
      border-left: 0;
    }
    .panel > .table-bordered > thead > tr > th:last-child,
    .panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
    .panel > .table-bordered > tbody > tr > th:last-child,
    .panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
    .panel > .table-bordered > tfoot > tr > th:last-child,
    .panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
    .panel > .table-bordered > thead > tr > td:last-child,
    .panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
    .panel > .table-bordered > tbody > tr > td:last-child,
    .panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
    .panel > .table-bordered > tfoot > tr > td:last-child,
    .panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
      border-right: 0;
    }
    .panel > .table-bordered > thead > tr:first-child > td,
    .panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
    .panel > .table-bordered > tbody > tr:first-child > td,
    .panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
    .panel > .table-bordered > thead > tr:first-child > th,
    .panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
    .panel > .table-bordered > tbody > tr:first-child > th,
    .panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
      border-bottom: 0;
    }
    .panel > .table-bordered > tbody > tr:last-child > td,
    .panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
    .panel > .table-bordered > tfoot > tr:last-child > td,
    .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
    .panel > .table-bordered > tbody > tr:last-child > th,
    .panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
    .panel > .table-bordered > tfoot > tr:last-child > th,
    .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
      border-bottom: 0;
    }
    .panel > .table-responsive {
      border: 0;
      margin-bottom: 0;
    }
    </style>
    <?php
}

function my_plugin_menu() {
    if (current_user_can( 'manage_options' )) {
        add_menu_page(__('Reservas','menu-test'), __('Reservas','menu-test'), 'manage_options', 'list-reserva', 'action_reservas', 'dashicons-calendar-alt', 12 );
        add_submenu_page( 'list-reserva', 'Reservas da Semana', 'Reservas da Semana', 'manage_options', 'reservas-dias', 'reservas_dias' );
        add_submenu_page( 'list-reserva', 'Calendário de Reser.', 'Calendário de Reser.', 'manage_options', 'reservas-mes', 'reservas_calendario' );
        add_submenu_page( 'list-reserva', 'Adicionar Reserva', 'Adicionar Reserva', 'manage_options', 'reservas-adicionar', 'reservas_adicionar' );
        add_submenu_page( 'list-reserva', 'Bloquear Dias', 'Bloquear Dias', 'manage_options', 'reservas-bloquear', 'reservas_bloquear' );
        add_submenu_page( 'list-reserva', 'Configurações', 'Configurações', 'manage_options', 'reservas-configuracoes', 'reservas_configuracoes' );
    }
}

add_action( 'admin_menu', 'my_plugin_menu' );
function action_reservas() {
    global $wpdb;
    $action = (isset($_GET['action'])) ? $_GET['action'] : false;
    $page = (isset($_GET['p'])) ? (int) $_GET['p'] : 1;
    $search = (isset($_GET['s'])) ? (string) $_GET['s'] : false;
    $day = (isset($_GET['day'])) ? (string) $_GET['day'] : false;
    $actionPesquisa = ($search) ? " WHERE name LIKE '%{$search}%' OR email LIKE '%{$search}%' OR phone LIKE '%{$search}%' OR cpf LIKE '%{$search}%' OR city LIKE '%{$search}%' OR state LIKE '%{$search}%' OR address LIKE '%{$search}%' OR price LIKE '%{$search}%'" : '';
    if ($day) {
        switch($day) {
            case 'tomorrow_registry': $dateFull = date("Y-m-d H:i:s", strtotime("+1 days")); $actionPesquisa = " WHERE date_created='$dateFull'"; break;
            case 'today_registry': $dateFull = date("Y-m-d H:i:s"); $actionPesquisa = " WHERE date_created='$dateFull'"; break;
            case 'yesterday_booking': $dateFull = date("Y-m-d", strtotime("-1 days")); $actionPesquisa = " WHERE date='$dateFull'"; break;
            case 'today_booking': $dateFull = date("Y-m-d"); $actionPesquisa = " WHERE date='$dateFull'"; break;
            case 'tomorrow_booking': $dateFull = date("Y-m-d", strtotime("+1 days")); $actionPesquisa = " WHERE date='$dateFull'"; break;
        }
    }
    $dateFull = date("Y-m-d H:i:s", strtotime("+1 days"));
    $tomorrow_registry = $wpdb->get_results( "SELECT * FROM teetime_bookings WHERE date_created='$dateFull'" );
    $dateFull = date("Y-m-d H:i:s");
    $today_registry = $wpdb->get_results( "SELECT * FROM teetime_bookings WHERE date_created='$dateFull'" );
    $dateFull = date("Y-m-d", strtotime("-1 days"));
    $yesterday_booking = $wpdb->get_results( "SELECT * FROM teetime_bookings WHERE date='$dateFull'" );
    $dateFull = date("Y-m-d");
    $today_booking = $wpdb->get_results( "SELECT * FROM teetime_bookings WHERE date='$dateFull'" );
    $dateFull = date("Y-m-d", strtotime("+1 days"));
    $tomorrow_booking = $wpdb->get_results( "SELECT * FROM teetime_bookings WHERE date='$dateFull'" );

    $quantityPage = 25;

    $AllBookings = $wpdb->get_results(
        "SELECT * FROM teetime_bookings INNER JOIN teetime_users ON teetime_bookings.user_id = teetime_users.id {$actionPesquisa}"
    );
    $quantityBookings = count($AllBookings);
    $offsetPage = ($page * $quantityPage) - $quantityPage;
    $totalPage = ceil($quantityBookings / $quantityPage);
    if (!$action) {
        $bookingList = $wpdb->get_results(
            "SELECT teetime_bookings.id, teetime_users.name, teetime_users.cpf, teetime_users.phone, teetime_users.city, teetime_users.state, teetime_users.address, teetime_users.email, teetime_users.phone, teetime_bookings.date, teetime_bookings.price, teetime_bookings.date_created FROM teetime_bookings INNER JOIN teetime_users ON teetime_bookings.user_id = teetime_users.id {$actionPesquisa} ORDER BY date_created DESC LIMIT {$quantityPage} OFFSET {$offsetPage}"
        );
        ?>
        <div class="wrap">
            <h2>Reservas</h2>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-3">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <ul class="subsubsub">
                                <li class="all"><a href="?page=list-reserva" aria-current="page">Tudo <span class="count">(<?php echo $quantityBookings; ?>)</span></a> |</li>
                                <li class="publish"><a href="?page=list-reserva&day=tomorrow_registry">Cadastro Ontem <span class="count">(<?php echo count($tomorrow_registry); ?>)</span></a> |</li>
                                <li class="publish"><a href="?page=list-reserva&day=today_registry">Cadastro Hoje <span class="count">(<?php echo count($today_registry); ?>)</span></a> |</li>
                                <li class="publish"><a href="?page=list-reserva&day=yesterday_booking">Reserva Ontem <span class="count">(<?php echo count($yesterday_booking); ?>)</span></a> |</li>
                                <li class="publish"><a href="?page=list-reserva&day=today_booking">Reserva Hoje <span class="count">(<?php echo count($today_booking); ?>)</span></a> |</li>
                                <li class="publish"><a href="?page=list-reserva&day=tomorrow_booking">Reserva Amanhã <span class="count">(<?php echo count($tomorrow_booking); ?>)</span></a></li>
                            </ul>
                            <form action="">
                                <p class="search-box">
                                    <label class="screen-reader-text" for="post-search-input">Pesquisar Reservas:</label>
                                    <input type="search" id="post-search-input" name="s" value="<?php if ($search) { echo $search; } ?>">
                                    <input type="hidden" name="page" value="list-reserva">
                                    <input type="submit" id="search-submit" class="button" value="Pesquisar Reservas">
                                </p>
                            </form>
                            <form method="post">
                                <input type="hidden" id="_wpnonce" name="_wpnonce" value="065cb4d44c">
                                <input type="hidden" name="_wp_http_referer" value="/fabiofreitas/golfe/wp-admin/admin.php?page=list-reserva">
                                <?php 
                                if ($totalPage > 1) {
                                    ?>
                                    <div class="tablenav top">
                                        <div class="tablenav-pages">
                                            <span class="displaying-num"><?php echo $quantityBookings; ?> item(ns)</span>
                                            <span class="pagination-links">
                                                <?php 
                                                if ($page == 1) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=list-reserva&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-reserva&amp;p=<?php echo $page-1; ?>">
                                                        <span class="screen-reader-text">Primeira página</span>
                                                        <span aria-hidden="true">‹</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                                <span class="paging-input">
                                                    <label for="current-page-selector" class="screen-reader-text">
                                                        Página atual
                                                    </label>
                                                    <input class="current-page" id="current-page-selector" type="text" name="p" value="<?php echo $page; ?>" size="<?php echo $totalPage; ?>" aria-describedby="table-paging">
                                                    <span class="tablenav-paging-text"> de <span class="total-pages"><?php echo $totalPage; ?></span></span>
                                                </span>
                                                <?php 
                                                if ($page == $totalPage) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=list-reserva&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-reserva&amp;p=<?php echo $totalPage; ?>">
                                                        <span class="screen-reader-text">Última página</span>
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <?php
                                }
                                if ($bookingList) {
                                    ?>
                                    <table class="wp-list-table widefat fixed striped reservas">
                                        <thead>
                                            <tr>
                                                <td id="cb" class="manage-column column-cb check-column">
                                                    <label class="screen-reader-text" for="cb-select-all-1">Selecionar todos</label><input id="cb-select-all-1" type="checkbox">
                                                </td> 
                                                <th scope="col" id="nome" class="manage-column column-nome column-primary"> Nome </th>
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem" width="100"> Reserva </th>
                                                <th scope="col" id="email" class="manage-column column-email" width="100"> Valor </th> 
                                                <th scope="col" id="email" class="manage-column column-email"> Email </th> 
                                                <th scope="col" id="telefone" class="manage-column column-telefone" width="120"> Telefone </th>
                                                <th scope="col" id="telefone" class="manage-column column-telefone" width="120"> Data de Cadastro </th> 
                                            </tr>
                                        </thead>
                                        <tbody id="the-list">
                                            <?php 
                                            foreach ($bookingList as $bookingCurrent) {
                                                ?>
                                                <tr id="post-20" class="iedit author-self level-0 post-20 type-page status-publish hentry">
                                                    <th scope="row" class="check-column">
                                                        <input id="cb-select-20" type="checkbox" name="post[]" value="20">
                                                    </th>
                                                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">
                                                        <div class="locked-info"><span class="locked-avatar"></span><span class="locked-text"></span></div>
                                                        <strong>
                                                            <a class="row-title" href="?page=list-reserva&action=view&id=<?php echo $bookingCurrent->id; ?>">
                                                                <?php echo $bookingCurrent->name; ?>
                                                            </a>
                                                        </strong>
                                                       <!--  <div class="row-actions">
                                                            <span class="edit">
                                                                <a href="" aria-label="Editar “Academia”">Editar</a>
                                                                | 
                                                            </span>
                                                            <span class="inline hide-if-no-js">
                                                                <a href="#" class="editinline" aria-label="Editar diretamente “Academia”">Edição rápida</a>
                                                                | 
                                                            </span>
                                                            <span class="trash">
                                                                <a href="http://localhost/fabiofreitas/golfe/wp-admin/post.php?post=20&amp;action=trash&amp;_wpnonce=46d7bd15df" class="submitdelete" aria-label="Mover “Academia” para a lixeira">Colocar na lixeira</a>
                                                                | 
                                                            </span>
                                                            <span class="view">
                                                                <a href="http://localhost/fabiofreitas/golfe/academia/" rel="bookmark" aria-label="Ver “Academia”">Ver</a>
                                                            </span>
                                                        </div> -->
                                                        <button type="button" class="toggle-row"><span class="screen-reader-text">Mostrar mais detalhes</span></button>
                                                    </td>
                                                    <td class="date column-date" data-colname="Reserva"><?php echo strftime("%d/%m/%Y", strtotime($bookingCurrent->date)); ?></td>
                                                    <td class="author column-author" data-colname="Preço">R$ <?php echo number_format($bookingCurrent->price, 2, ',', '.'); ?></td>
                                                    <td class="author column-author" data-colname="E-mail"><?php echo $bookingCurrent->email; ?></td>
                                                    <td class="author column-author" data-colname="Telefone"><?php echo $bookingCurrent->phone; ?></td>
                                                    <td class="date column-date" data-colname="Data"><?php echo strftime("%d/%m/%Y %H:%M", strtotime($bookingCurrent->date_created)); ?></td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td id="cb" class="manage-column column-cb check-column">
                                                    <label class="screen-reader-text" for="cb-select-all-1">Selecionar todos</label><input id="cb-select-all-1" type="checkbox">
                                                </td> 
                                                <th scope="col" id="nome" class="manage-column column-nome column-primary"> Nome </th> 
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem"> Reserva </th>
                                                <th scope="col" id="email" class="manage-column column-email"> Valor </th> 
                                                <th scope="col" id="email" class="manage-column column-email"> Email </th> 
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Telefone </th>
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Data de Cadastro </th> 
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php 
                                }
                                else {
                                    ?>
                                    <form method="post">
                                        <table class="wp-list-table widefat fixed striped reservas">
                                            <tr>
                                                <td>
                                                    <p>Nenhuma reserva encontrada no sistema.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php
                                }

                                if ($totalPage > 1) {
                                    ?>
                                    <div class="tablenav bottom">
                                        <div class="tablenav-pages">
                                            <span class="displaying-num">
                                                <?php echo $quantityBookings; ?> item(ns)
                                            </span>
                                            <span class="pagination-links">
                                                <?php 
                                                if ($page == 1) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=list-reserva&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-reserva&amp;p=<?php echo $page-1; ?>">
                                                        <span class="screen-reader-text">Primeira página</span>
                                                        <span aria-hidden="true">‹</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                                <span class="paging-input">
                                                    <label for="current-page-selector" class="screen-reader-text">
                                                        Página atual
                                                    </label>
                                                    <input class="current-page" id="current-page-selector" type="text" name="p" value="<?php echo $page; ?>" size="<?php echo $totalPage; ?>" aria-describedby="table-paging">
                                                    <span class="tablenav-paging-text"> de <span class="total-pages"><?php echo $totalPage; ?></span></span>
                                                </span>
                                                <?php 
                                                if ($page == $totalPage) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=list-reserva&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-reserva&amp;p=<?php echo $totalPage; ?>">
                                                        <span class="screen-reader-text">Última página</span>
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <?php 
                                }

                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
    <?php
    }
    else if ($action == 'view') {
        $id = (isset($_GET['id'])) ? $_GET['id']: false;
        $bookingList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM teetime_bookings WHERE id='%s'",
                $id
            )
        );
        $idClient = $bookingList[0]->user_id;
        $userList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM teetime_users WHERE id='%s'",
                 $idClient
            )
        );
        $quantityBooking = count($bookingList);
        $quantityUser = count($quantityBooking);
        if ($quantityBooking == 1 && $quantityUser == 1) {
            $bookingCurrent = $bookingList[0];
            $userCurrent = $userList[0];

            $nameCategory = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM teetime_categories WHERE id='%s'",
                     $bookingCurrent->category_id
                )
            );

            $hourList = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM teetime_hours WHERE booking_id='%s' ORDER BY hours ASC",
                     $id
                )
            );
            $rentsList = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM teetime_rents WHERE booking_id='%s'",
                     $id
                )
            );
            ?>
            <div class="wrap teetime-booking-view">
                <h2>Reservas</h2>
                <div class="teetime-booking row">
                    <div id="post-body" class="teetime-column col-6">
                        <h3>Reserva</h3>
                        <table class="table-teetime-booking">
                            <tr><td><strong>Tipo de Jogo</strong></td><td><?php echo $nameCategory[0]->name; ?> - R$ <?php echo number_format($nameCategory[0]->price, 2, ',', '.'); ?> por pessoa</td></tr>
                            <tr><td><strong>Cliente</strong></td><td><?php echo $userCurrent->name; ?></td></tr>
                            <tr><td><strong>Data</strong></td><td><?php echo strftime("%d/%m/%Y", strtotime($bookingCurrent->date)); ?></td></tr>
                            <tr><td><strong>Valor</strong></td><td>R$ <?php echo number_format($bookingCurrent->price, 2, ',', '.'); ?></td></tr>
                        </table>
                        <p>A reserva foi feita no dia <?php echo strftime("%d/%m/%Y às %H:%M", strtotime($bookingCurrent->date_created)); ?></p>
                        <h3>Produtos</h3>
                        <?php
                        if (count($rentsList) > 0) {
                            ?>
                            <table class="table-teetime-booking">
                            <?php
                            foreach ($rentsList as $rentCurrent) {
                                $productsList = $wpdb->get_results(
                                    $wpdb->prepare(
                                        "SELECT * FROM teetime_products WHERE id='%s'",
                                        $rentCurrent->product_id
                                    )
                                );

                                ?>
                                <tr><td><strong><?php echo $productsList[0]->title; ?></strong></td><td><?php echo $rentCurrent->quantity; ?> unidade(s)</td></tr>
                                <?php
                            }
                            ?></table><?php
                        }
                        else {
                            ?><p><strong>Nenhum produto selecionado!</strong></p><?php
                        }
                        ?>
                        <h3>Horários</h3>
                        <?php
                        if (count($hourList) > 0) {
                            ?>
                            <table class="table-teetime-booking">
                            <tr><td colspan="1"><strong>Horário</strong></td><td colspan="3"><strong><?php echo strftime("%H:%M", strtotime($hourList[0]->hours)); ?></strong></td></tr>
                            <?php
                            $thisHour = $hourList[0]->hours;
                            $numJog = 1;
                            foreach ($hourList as $hourCurrent) {
                                if ($thisHour != $hourCurrent->hours) {
                                    $numJog = 1;
                                    ?></table><br /><table class="table-teetime-booking"><tr><td colspan="1"><strong>Horário</strong></td><td colspan="3"><strong><?php echo strftime("%H:%M", strtotime($hourCurrent->hours)); ?></strong></td></tr><?php
                                }
                                ?>
                                    <tr><td><strong>Jogador <?php echo $numJog; ?></strong></td><td><?php echo $hourCurrent->name; ?></td><td><?php echo $hourCurrent->index; ?> <small>(Index)</small></td><td><?php echo $hourCurrent->age; ?> <small>(Idade)</small></td></tr>
                                <?php 
                                $thisHour = $hourCurrent->hours;
                                $numJog++;
                            }
                            ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                    <div id="post-body" class="teetime-column col-4">
                        <h3>Cliente</h3>
                        <table class="table-teetime-booking">
                            <tr><td><strong>Cliente</strong></td><td><?php echo $userCurrent->name; ?></td></tr>
                            <tr><td><strong>CPF</strong></td><td><?php echo $userCurrent->cpf; ?></td></tr>
                            <tr><td><strong>Nascimento</strong></td><td><?php echo strftime("%d/%m/%Y", strtotime($userCurrent->birth)); ?></td></tr>
                            <tr><td><strong>Telefone</strong></td><td><?php echo $userCurrent->phone; ?></td></tr>
                            <tr><td><strong>E-mail</strong></td><td><?php echo $userCurrent->email; ?></td></tr>
                        </table>
                        <p>Usuário cadastrado no dia <?php echo strftime("%d/%m/%Y às %H:%M", strtotime($userCurrent->date_created)); ?></p>
                        <h3>Endereço do Cliente</h3>
                        <table class="table-teetime-booking">
                            <tr><td><strong>Cidade</strong></td><td><?php echo $userCurrent->city; ?> - <?php echo $userCurrent->state; ?></td></tr>
                            <tr><td><strong>Bairro</strong></td><td><?php echo $userCurrent->district; ?></td></tr>
                            <tr><td><strong>Endereço</strong></td><td><?php echo $userCurrent->address; ?> <?php echo $userCurrent->number; ?> (<?php echo $userCurrent->complement; ?>)</td></tr>
                            <tr><td><strong>CEP</strong></td><td><?php echo $userCurrent->zip_code; ?></td></tr>
                        </table>
                    </div>
                    <br class="clear">
                </div>
            </div>
            <?php
        }
    }
}

function reservas_adicionar() {
}
function reservas_calendario() {
    global $wpdb;
    if(isset($_GET['mes'])){
        $mes = addslashes(strip_tags($_GET['mes']));
        $mes_atual = str_pad($mes, 2, "0", STR_PAD_LEFT); 
    } else{
        $mes = date('m');
        $mes_atual = date('m');
    }

    $next = $mes+1;
    $prev = $mes-1;
    $prev_link = "?page=reservas-mes&mes=$prev";
    $next_link = "?page=reservas-mes&mes=$next";

    $ano = date('Y');

    $timestamp =  gmmktime(0,0,0,$mes,1,$ano);
    list($mes_busca, $ano_busca) = explode(',',gmstrftime('%m,%Y',$timestamp));

    $first_of_month = gmmktime(0,0,0,$mes_busca,1,$ano);
    $month_name = gmstrftime('%B',$first_of_month);

    $meses['january'] = "janeiro";
    $meses['february'] = "fevereiro";
    $meses['march'] = "março";
    $meses['april'] = "abril";
    $meses['may'] = "maio";
    $meses['june'] = "junho";
    $meses['july'] = "julho";
    $meses['august'] = "agosto";
    $meses['september'] = "setembro";
    $meses['october'] = "outubro";
    $meses['november'] = "novembro";
    $meses['december'] = "dezembro";

    $meses['janeiro'] = "janeiro";
    $meses['fevereiro'] = "fevereiro";
    $meses['março'] = "março";
    $meses['abril'] = "abril";
    $meses['maio'] = "maio";
    $meses['junho'] = "junho";
    $meses['julho'] = "julho";
    $meses['agosto'] = "agosto";
    $meses['setembro'] = "setembro";
    $meses['outubro'] = "outubro";
    $meses['novembro'] = "novembro";
    $meses['dezembro'] = "dezembro";

    ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"> Calendário de reservas </h1>

        <div class="calendario_topo">
            <a href="<?php echo $prev_link ?>" class="prev"> &laquo; </a>
            <a href="<?php echo $next_link ?>" class="next"> &raquo; </a>
            <h2> <?php echo $meses[ strtolower( $month_name) ] ?><?php if($ano_busca != date('Y')) echo '/'.$ano_busca ?> </h2>
        </div>
        <?php 
        setlocale(LC_ALL, 'pt_BR', 'portuguese');

        $days = array();

        $calendario = $wpdb->get_results("SELECT id, date, category_id FROM teetime_bookings g WHERE MONTH(date)='{$mes_atual}'");

        if(count($calendario) > 0){
             foreach($calendario as $c){

                $dia = date('j',strtotime($c->date));

                $horarios = $wpdb->get_results("SELECT id, hours, name, booking_id FROM teetime_hours h WHERE booking_id={$c->id} ORDER BY hours ASC ");

                $link = '#';
                $content = NULL;
                $title = "";
                $content = "";
                $classes = "";

                foreach ($horarios as $h) {
                    if ($c->category_id == '1') {
                        $class = "label label-success";
                    }
                    elseif($c->category_id == '2'){
                        $class = "label label-warning";
                    }
                    elseif($c->category_id == '3'){
                        $class = "label label-info";
                    }

                    $content .= '<a href="?page=list-reserva&action=view&id='.$c->id.'" class="wrap_horario '.$class.'">';
                    $content .= date('H:i', strtotime($h->hours));
                    $content .= "<span class='jogadores'>";
                    $content .= ''. $h->name;
                    $content .= "</span>";
                    $content .= "</a>";
                }

                $days[$dia] = array($link, $classes, $content, $title);
             }

        }else{
            $days = NULL;
        }
        ?>

        <div class="panel panel-default">
            <?php echo generate_calendar($ano, $mes, $days, 3, NULL, 0, NULL); ?>
        </div>
    </div>
    <?php
}
function reservas_dias() {
    global $wpdb;
    ?>
    <div class="wrap">
        <h2>Reservas da Semana</h2>
        <?php 
        $dateTime = new DateTime();
        $dayToday = $dateTime->format("d/m");

        $dateBefore = 3;
        $dateAfter = 7;

        $dateTime->modify("-" . $dateBefore . " day");
        ?>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-3">
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <form method="post">
                            <table class="wp-list-table widefat fixed striped reservas reservas-diarias">
                                <thead>
                                    <tr>
                                        <th id="cb" class="manage-column column-cb check-column"></th>
                                        <?php
                                        $planList = array();
                                        $allDates = array();
                                        for($dn = 0; $dn <= ($dateBefore + $dateAfter); $dn++) {
                                            $dateBase = $dateTime->format("Y-m-d");
                                            $allDates[] = $dateBase;
                                            $listDate = $wpdb->get_results("
                                                SELECT teetime_bookings.id, teetime_bookings.category_id, teetime_bookings.user_id, teetime_bookings.price, teetime_bookings.date, teetime_users.name, teetime_users.cpf, teetime_users.birth,  teetime_users.phone, teetime_users.email
                                                FROM teetime_bookings 
                                                INNER JOIN teetime_users ON teetime_bookings.user_id = teetime_users.id 
                                                WHERE date='{$dateBase}'
                                            ");
                                            foreach ($listDate as $currentDate) {
                                                $bookingId = $currentDate->id;
                                                $listHours = $wpdb->get_results(
                                                    "SELECT * FROM teetime_hours WHERE booking_id='{$bookingId}'"
                                                );
                                                foreach ($listHours as $hoursCurrent) {
                                                    $bookingHours = $hoursCurrent->hours;
                                                    $horaAtual = (string) strftime("%H:%M", strtotime($bookingHours));                                                    $planList[$dateBase][$horaAtual]['user'] = $currentDate;
                                                    $planList[$dateBase][$horaAtual]['hours'][] = $currentDate;
                                                }
                                            }

                                            $dateCurrent = $dateTime->format("d/m");
                                            ?>
                                            <th id="cb" class="manage-column column-cb check-column">
                                                <?php if ($dayToday != $dateCurrent) { echo $dateCurrent; } else { echo '<strong>' . $dateCurrent . ' (Hoje)</strong>'; } ?>
                                            </th>
                                            <?php
                                            $dateTime->modify("+1 day");
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id="the-list">
                                    <?php
                                    $hoursTime = new DateTime();
                                    
                                    $hoursInit = 7;
                                    $hoursFinish = 16;
                                    
                                    $hoursTime->setTime($hoursInit, 0, 0);
                                    $horaAtual = (int) $hoursTime->format("H");

                                    $listHoras = true;
                                    while ($listHoras) {
                                        $hoursCurrent = (string) $hoursTime->format("H:i");
                                        ?>
                                        <tr id="post-20" class="iedit author-self level-0 post-20 type-page status-publish hentry">
                                            <td class="title column-title has-row-actions column-primary page-title"><?php echo $hoursCurrent; ?></td>
                                            <?php 
                                            foreach ($allDates as $readDate){
                                                ?>
                                                <td>
                                                    <?php 
                                                    if (isset($planList[$readDate][$hoursCurrent])) {
                                                            $usuarioAtual = $planList[$readDate][$hoursCurrent]['user'];
                                                            $horarioAtual = $planList[$readDate][$hoursCurrent]['hours'];
                                                        ?>
                                                        <div class="box-calendar-detail">
                                                            <a href="?page=list-reserva&action=view&id=<?php echo $usuarioAtual->id; ?>">
                                                                <?php 
                                                                echo $usuarioAtual->name;
                                                                ?>
                                                            </a>
                                                            <div class="detail-single-calendar">
                                                                <h3>Detalhes</h3>
                                                                <p>
                                                                    <strong>Data: </strong> <?php echo strftime("%d/%m/%Y", strtotime($readDate)); ?><br />
                                                                    <strong>Hora: </strong> <?php echo $hoursCurrent; ?><br />
                                                                </p>
                                                                <h3>Dados</h3>
                                                                <p>
                                                                    <strong>Nome: </strong> <?php echo $usuarioAtual->name; ?><br />
                                                                    <strong>Telefone: </strong> <?php echo $usuarioAtual->phone; ?><br />
                                                                    <strong>E-mail: </strong> <?php echo $usuarioAtual->email; ?><br />
                                                                </p>
                                                                <h3>R$ <?php echo number_format($usuarioAtual->price, 2, ',', '.'); ?></h3>
                                                                <a href="?page=list-reserva&action=view&id=<?php echo $usuarioAtual->id; ?>">Ver Detalhes</a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    } 
                                                    ?>
                                                </td>
                                                <?php 
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $hoursTime->modify("+10 minute");
                                        $listHoras = ($horaAtual != $hoursFinish) ? true : false;
                                        $horaAtual = (int) $hoursTime->format("H");
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <br class="clear">
        </div>
    </div>
    <?php
}
function reservas_bloquear() {

}
function reservas_configuracoes() {

}
?>