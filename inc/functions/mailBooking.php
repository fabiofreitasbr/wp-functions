<?php 
function mailBooking($id) {
    global $wpdb;
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
        $contentBook = '';

        $contentBook .= '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Document
            </title>
        </head>
        <body>
        <div style="font-size: 18px; font-family: \'Arial\', \'trebuchet MS\'; margin: 0px auto; width: 600px; " width="600">
            <div align="center">
                <img src="http://www.rioogc.com.br/wp-content/themes/golfe/img/logo-golfe-preto.png" width="150" height="81" style="width: 150px; height: 81;" alt="RIO OGC">
                <h2 style=" text-transform: uppercase;">Reserva Enviada</h2>
            </div>
            <div>
                <div>
                    <h3>Reserva</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Tipo de Jogo</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $nameCategory[0]->name . ' - R$ ' .  number_format($nameCategory[0]->price, 2, ',', '.') . ' por pessoa</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Cliente</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->name . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Data</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  strftime("%d/%m/%Y", strtotime($bookingCurrent->date)) . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Valor</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">R$ ' .  number_format($bookingCurrent->price, 2, ',', '.') . '</td></tr>
                    </table>
                    <p>A reserva foi feita no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($bookingCurrent->date_created)) . '</p>
                    <h3>Produtos</h3>';
                    if (count($rentsList) > 0) {
                        $contentBook .= '
                        <table style="box-sizing: border-box; width: 100%;">
                        ';
                        foreach ($rentsList as $rentCurrent) {
                            $productsList = $wpdb->get_results(
                                $wpdb->prepare(
                                    "SELECT * FROM teetime_products WHERE id='%s'",
                                    $rentCurrent->product_id
                                )
                            );

                            $contentBook .= '<tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>' .  $productsList[0]->title . '</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $rentCurrent->quantity . ' unidade(s)</td></tr>';
                        }
                        $contentBook .= '</table>';
                    }
                    else {
                        $contentBook .= '<p><strong>Nenhum produto selecionado!</strong></p>';
                    }
                    $contentBook .= '<h3>Horários</h3>';
                    if (count($hourList) > 0) {
                        $contentBook .= '
                        <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right" colspan="1"><strong>Horário</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;" colspan="3"><strong>' .  strftime("%H:%M", strtotime($hourList[0]->hours)) . '</strong></td></tr>
                        ';
                        $thisHour = $hourList[0]->hours;
                        $numJog = 1;
                        foreach ($hourList as $hourCurrent) {
                            if ($thisHour != $hourCurrent->hours) {
                                $numJog = 1;
                                $contentBook .= '</table><br /><table style="box-sizing: border-box; width: 100%;"><tr><td colspan="1"><strong>Horário</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;" colspan="3"><strong>' .  strftime("%H:%M", strtotime($hourCurrent->hours)) . '</strong></td></tr>';
                            }
                            $contentBook .= '
                                <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Jogador ' .  $numJog . '</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $hourCurrent->name . '</td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $hourCurrent->index . ' <small>(Index)</small></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $hourCurrent->age . ' <small>(Idade)</small></td></tr>
                            ';
                            $thisHour = $hourCurrent->hours;
                            $numJog++;
                        }
                        $contentBook .= '
                        </table>
                        ';
                    }
                    $contentBook .= '
                </div>
                <div>
                    <h3>Cliente</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Cliente</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->name . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>CPF</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->cpf . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Nascimento</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  strftime("%d/%m/%Y", strtotime($userCurrent->birth)) . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Telefone</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->phone . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>E-mail</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->email . '</td></tr>
                    </table>
                    <p>Usuário cadastrado no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($userCurrent->date_created)) . '</p>
                    <h3>Endereço do Cliente</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Cidade</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->city . ' - ' .  $userCurrent->state . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Bairro</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->district . '</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>Endereço</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->address . ' ' .  $userCurrent->number . ' (' .  $userCurrent->complement . ')</td></tr>
                        <tr><td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #757513; color: #efefef; width: 120px !important; text-align: right"><strong>CEP</strong></td><td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $userCurrent->zip_code . '</td></tr>
                    </table>
                </div>
                <br>
            </div>
        </div>
        </body>
        </html>
        ';
        $destinatario = array('contato@rioogc.com.br', 'fabio@yxe.com.br', 'rodrigo@yxe.com.br');
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