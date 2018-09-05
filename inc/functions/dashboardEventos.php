<?php 
date_default_timezone_set('Brazil/East');
add_action('admin_head', 'events_booking_style');

function events_booking_style() {
    ?>
    <style type="text/css">
    .events-booking-view { font-size: 18px}
    .table-events-booking { box-sizing: border-box; width: 100%; }
    table.table-events-booking tr td { padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word; word-break: break-word; }
    table.table-events-booking tr td:first-child { background-color: #757513; color: #efefef; width: 120px !important; text-align: right; vertical-align: top; }
    .events-booking.row { display: flex; flex-flow: row wrap; } 
    /* .events-columm { flex: 1; } */
    .events-column.col-1 { width: 10%; }
    .events-column.col-2 { width: 20%; }
    .events-column.col-3 { width: 30%; }
    .events-column.col-4 { width: 40%; }
    .events-column.col-5 { width: 50%; }
    .events-column.col-6 { width: 60%; }
    .events-column.col-7 { width: 70%; }
    .events-column.col-8 { width: 80%; }
    .events-column.col-9 { width: 90%; }
    .events-column.col-10 { width: 100%; }
    @media print { 
        body * { visibility: hidden; } 
        #wpbody-content #message, #wpbody-content #message * { visibility: hidden !important; } 
        #wpbody-content, #wpbody-content * { visibility: visible !important; } 
        #wpbody-content { position: fixed; left: 0; top: 0; }
    }
    </style>
    <?php
}
function eventsMenu() {
    if (current_user_can( 'manage_options' )) {
        add_menu_page(__('Eventos','menu-test'), __('Eventos','menu-test'), 'manage_options', 'list-events', 'events_options', 'dashicons-feedback', 12 );
    }
}

add_action( 'admin_menu', 'eventsMenu' );
function events_options() {
    global $wpdb;
    $action = (isset($_GET['action'])) ? $_GET['action'] : false;
    $page = (isset($_GET['p'])) ? (int) $_GET['p'] : 1;
    $search = (isset($_GET['s'])) ? (string) $_GET['s'] : false;
    $day = (isset($_GET['day'])) ? (string) $_GET['day'] : false;
    $actionPesquisa = ($search) ? " WHERE name LIKE '%{$search}%' OR email LIKE '%{$search}%' OR phone LIKE '%{$search}%' OR city LIKE '%{$search}%' OR state LIKE '%{$search}%' OR address LIKE '%{$search}%'" : '';
    if ($day) {
        switch($day) {
            case 'tomorrow_registry': $dateFull = date("Y-m-d H:i:s", strtotime("+1 days")); $actionPesquisa = " WHERE date_created='$dateFull'"; break;
            case 'today_registry': $dateFull = date("Y-m-d H:i:s"); $actionPesquisa = " WHERE date_created='$dateFull'"; break;
            case 'yesterday_booking': $dateFull = date("Y-m-d", strtotime("-1 days")); $actionPesquisa = " WHERE date='$dateFull'"; break;
            case 'today_booking': $dateFull = date("Y-m-d"); $actionPesquisa = " WHERE date='$dateFull'"; break;
            case 'tomorrow_booking': $dateFull = date("Y-m-d", strtotime("+1 days")); $actionPesquisa = " WHERE date='$dateFull'"; break;
        }
    }

    $quantityPage = 25;

    $AllBookings = $wpdb->get_results(
        "SELECT * FROM events_bookings {$actionPesquisa}"
    );
    $quantityBookings = count($AllBookings);
    $offsetPage = ($page * $quantityPage) - $quantityPage;
    $totalPage = ceil($quantityBookings / $quantityPage);

    if (!$action) {
        $bookingList = $wpdb->get_results(
            "SELECT * FROM events_bookings {$actionPesquisa} ORDER BY date_created DESC LIMIT {$quantityPage} OFFSET {$offsetPage}"
        );
        ?>
        <div class="wrap">
            <h2>Reservas</h2>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-3">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <ul class="subsubsub">
                                <li class="all"><a href="?page=list-events" aria-current="page">Tudo <span class="count">(<?php echo $quantityBookings; ?>)</span></a></li>
                            </ul>
                            <form action="">
                                <p class="search-box">
                                    <label class="screen-reader-text" for="post-search-input">Pesquisar Reservas:</label>
                                    <input type="search" id="post-search-input" name="s" value="<?php if ($search) { echo $search; } ?>">
                                    <input type="hidden" name="page" value="list-events">
                                    <input type="submit" id="search-submit" class="button" value="Pesquisar Reservas">
                                </p>
                            </form>
                            <form method="post">
                                <input type="hidden" id="_wpnonce" name="_wpnonce" value="065cb4d44c">
                                <input type="hidden" name="_wp_http_referer" value="/fabiofreitas/golfe/wp-admin/admin.php?page=list-events">
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
                                                    <a class="next-page" href="?page=list-events&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-events&amp;p=<?php echo $page-1; ?>">
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
                                                    <a class="next-page" href="?page=list-events&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-events&amp;p=<?php echo $totalPage; ?>">
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
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem"> Reserva </th>
                                                <th scope="col" id="quantidade" class="manage-column column-quantidade"> Quantidade </th> 
                                                <th scope="col" id="email" class="manage-column column-email"> Email </th> 
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Telefone </th>
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Data de Cadastro </th> 
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
                                                            <a class="row-title" href="?page=list-events&action=view&id=<?php echo $bookingCurrent->id; ?>">
                                                                <?php echo $bookingCurrent->name; ?>
                                                            </a>
                                                        </strong>
                                                        <button type="button" class="toggle-row"><span class="screen-reader-text">Mostrar mais detalhes</span></button>
                                                    </td>
                                                    <td class="date column-date" data-colname="Reserva"><?php echo strftime("%d/%m/%Y", strtotime($bookingCurrent->date)); ?></td>
                                                    <td class="author column-author" data-colname="Quantidade"><?php echo intval($bookingCurrent->quantity); ?> pessoa(s)</td>
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
                                                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Selecionar todos</label><input id="cb-select-all-1" type="checkbox"></td>
                                                <th scope="col" id="nome" class="manage-column column-nome column-primary"> Nome </th> 
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem"> Reserva </th>
                                                <th scope="col" id="quantidade" class="manage-column column-quantidade"> Quantidade </th>
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
                                                    <a class="next-page" href="?page=list-events&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-events&amp;p=<?php echo $page-1; ?>">
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
                                                    <a class="next-page" href="?page=list-events&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=list-events&amp;p=<?php echo $totalPage; ?>">
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
                "SELECT * FROM events_bookings WHERE id='%s'",
                $id
            )
        );
        $idClient = $bookingList[0]->user_id;
        $userList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM events_users WHERE id='%s'",
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
                    "SELECT * FROM events_categories WHERE id='%s'",
                    $bookingCurrent->category_id
                )
            );
            ?>
            <div class="wrap events-booking-view">
                <h2>Reservas</h2>
                <div class="events-booking row">
                    <div id="post-body" class="events-column col-6">
                        <h3>Reserva</h3>
                        <table class="table-events-booking">
                            <tr><td><strong>Evento</strong></td><td><?php echo $nameCategory[0]->name; ?></td></tr>
                            <tr><td><strong>Data</strong></td><td><?php echo strftime("%d/%m/%Y", strtotime($bookingCurrent->date)); ?></td></tr>
                            <tr><td><strong>Quantidade</strong></td><td><?php echo intval($bookingCurrent->quantity); ?> pessoa(s)</td></tr>
                        </table>
                        <p>A reserva foi enviada no dia <?php echo strftime("%d/%m/%Y às %H:%M", strtotime($bookingCurrent->date_created)); ?></p>
                        <h3>Detalhes do Evento</h3>
                        <table class="table-events-booking">
                            <tr><td><strong>Detalhes</strong></td><td><p><?php echo nl2br(htmlentities($bookingCurrent->detail)); ?></p></td></tr>
                        </table>
                    </div>
                    <div id="post-body" class="events-column col-4">
                        <h3>Organizador</h3>
                        <table class="table-events-booking">
                            <tr><td><strong>Organizador</strong></td><td><?php echo $bookingCurrent->name; ?></td></tr>
                            <tr><td><strong>E-mail</strong></td><td><?php echo $bookingCurrent->email; ?></td></tr>
                            <tr><td><strong>Telefone</strong></td><td><?php echo $bookingCurrent->phone; ?></td></tr>
                        </table>
                        <h3>Endereço do Organizador</h3>
                        <table class="table-events-booking">
                            <tr><td><strong>Cidade</strong></td><td><?php echo $bookingCurrent->city; ?> - <?php echo $bookingCurrent->state; ?></td></tr>
                            <tr><td><strong>Endereço</strong></td><td><?php echo $bookingCurrent->address; ?></td></tr>
                            <tr><td><strong>CEP</strong></td><td><?php echo $bookingCurrent->zip_code; ?></td></tr>
                        </table>
                    </div>
                    <br class="clear">
                </div>
            </div>
            <?php
        }
    }
}
?>