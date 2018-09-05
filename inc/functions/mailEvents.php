<?php 
function mailEvents($id) {
    global $wpdb;
    $bookingList = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM events_bookings WHERE id='%s'",
            $id
        )
    );
    $quantityBooking = count($bookingList);
    if ($quantityBooking == 1) {
        $bookingCurrent = $bookingList[0];
        $userCurrent = $userList[0];
        $nameCategory = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM events_categories WHERE id='%s'",
                 $bookingCurrent->category_id
            )
        );
        $contentBook = '';
        $contentBook .= '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Document</title>
        </head>
        <body>
        <div style="font-size: 18px; font-family: \'Arial\', \'trebuchet MS\'; margin: 0px auto; width: 600px; " width="600">
            <div align="center">
                <img src="http://www.rioogc.com.br/wp-content/themes/golfe/img/logo-golfe-preto.png" width="150" height="81" style="width: 150px; height: 81;" alt="RIO OGC">
                <h2 style=" text-transform: uppercase;">Evento Enviado</h2>
            </div>
            <div>
                <div>
                    <h3>Reserva</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Evento</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $nameCategory[0]->name . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Data</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  strftime("%d/%m/%Y", strtotime($bookingCurrent->date)) . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Quantidade</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  intval($bookingCurrent->quantity) . ' pessoa(s)</td></tr>
                    </table>
                    <p>O evento foi enviado no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($bookingCurrent->date_created)) . '</p>
                </div>
                <div>
                    <h3>Detalhes do Evento</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Detalhes</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $bookingCurrent->detail . '</td></tr>
                    </table>
                </div>
                <div>
                    <h3>Organizador</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Organizador</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->name . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>E-mail</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->email . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Telefone</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->phone . '</td></tr>
                    </table>
                    <h3>Endereço do Organizador</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Cidade</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->city . ' - ' .  $bookingCurrent->state . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Endereço</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->address . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>CEP</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $bookingCurrent->zip_code . '</td></tr>
                    </table>
                </div>
                <br>
            </div>
        </div>
        </body>
        </html>
        ';
        $destinatario = array('eventos@rioogc.com.br', 'fabio@yxe.com.br', 'rodrigo@yxe.com.br');
        // $destinatario = array('fabio@yxe.com.br');
        $assunto = 'Reserva - Rio OGC (Site)';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8'
        );
        define('WP_USE_THEMES', false);
        require(ABSPATH . 'wp-load.php');

        wp_mail($destinatario, $assunto, $contentBook, $headers);
    }
}
?>