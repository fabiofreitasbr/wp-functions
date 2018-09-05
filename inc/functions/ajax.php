<?php
function wpdocs_theme_name_scripts() {
    $idPage = get_the_ID();
    if ($idPage == 203 || $idPage == 285) {
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script-teetime.js', array(), '', true );
        wp_localize_script( 'scripts', 'ajax_object',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'jogadores' => 'insert_hours',
                'salvar' => 'save_booking', 
                'verify' => 'verify_hours', 
            )
        );
    }
    if ($idPage == 15) {
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script-events.js', array(), '', true );
        wp_localize_script( 'scripts', 'ajax_object',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'action' => 'save_events',
                'salvar' => 'event_send', 
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

add_action('wp_ajax_nopriv_insert_hours', 'insert_hours');
add_action('wp_ajax_insert_hours', 'insert_hours');

function insert_hours() {
    if (isset($_POST['id'])) {
        $idAtual = $_POST['id'];
        ?>
        <div class="wrap_horarios">
            <p class="hora_selecionar"> ESCOLHA O HORÁRIO </p>
            <select name="horario[<?php echo $idAtual; ?>]" class="horario">
                <?php 
                $hora = 7;
                $horaLimite = 16;
                $minuto = 0;
                $minutoLimite = 59;
                $horaInicial = mktime($hora, $minuto);
                for ($h = $hora; $h <= $horaLimite; $h++) {
                    for ($m = $minuto; $m <= $minutoLimite; $m = $m+10) { 
                        $horaInicial = mktime($h, $m); $dateShow = date("H:i", $horaInicial); ?><option value="<?php echo $dateShow; ?>"><?php echo $dateShow; ?></option><?php 
                        if ($h == $horaLimite) { break; }
                    }
                }
                ?>
            </select>
            <p class="left">Quantidade de jogadores</p>
            <select name="qtd_jogadores[<?php echo $idAtual; ?>]" class="qtd_jogadores">
                <?php for ($h = 1; $h <= 4; $h++) { ?><option value="<?php echo $h; ?>"><?php echo $h; ?></option><?php } ?>
            </select>
            <?php 
            for ($h = 1; $h <= 4; $h++) {
                ?>
                <div class="wrap_campos jogador-<?php echo $h; ?> <?php if ($h > 1) { echo 'off'; } ?>">
                    <div class="wrap_input">
                        <label for="jogador<?php echo $h; ?>"> Jogador <?php echo $h; ?> </label>
                        <input type="text" name="jogador[<?php echo $idAtual; ?>][<?php echo $h; ?>]" class="jogador-nome" value="">
                    </div>
                    <div class="wrap_input pequeno">
                        <label for="index<?php echo $h; ?>"> Index </label>
                        <input type="text" name="index[<?php echo $idAtual; ?>][<?php echo $h; ?>]" class="jogador-index" value="">
                    </div>
                    <div class="wrap_input pequeno">
                        <label for="idade<?php echo $h; ?>"> Idade </label>
                        <input type="text" name="idade[<?php echo $idAtual; ?>][<?php echo $h; ?>]" class="jogador-idade" value="">
                    </div>
                </div>
                <?php 
            }
            ?>
        </div>
        <?php
    }
    exit;
}


add_action('wp_ajax_nopriv_verify_hours', 'verify_hours');
add_action('wp_ajax_verify_hours', 'verify_hours');

function verify_hours() {
    global $wpdb;
    $response['status'] = false;
    $response['message'] = 'Houve algum erro, tente novamente mais tarde!';
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        $horarios = $_POST['horarios'];
        $countHorarios = array_count_values($horarios);
        $statusLoop = true;

        foreach ($countHorarios as $countCurrent) {
            if ($countCurrent > 1) { $statusLoop = false; break; }
        }
        
        if ($statusLoop) {
            $listData = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM teetime_bookings WHERE date='%s'",
                    $data
                )
            );
            $countDate = count($listData);
            if ($countDate > 0) {
                $statusHours = true;
                foreach ($listData as $dataCurrent) {
                    $idBooking = $dataCurrent->id;
                    $listHour = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * FROM teetime_hours WHERE booking_id='%d'",
                            $idBooking
                        )
                    );
                    foreach ($listHour as $hourCurrent) {
                        $horarioVerificar = (string) strftime("%H:%M", strtotime($hourCurrent->hours));
                        $verifyHours = in_array($horarioVerificar, $horarios);
                        if ($verifyHours == true) {  $response['message'] = 'O horário de ' . $horarioVerificar . ' já foi reservado neste dia, selecione outro horário!'; $statusHours = false; break 2; }
                    }
                }
                if ($statusHours) { $response['status'] = true; }
            }
            else { $response['status'] = true; }
        }
        else { $response['message'] = 'Não podem haver horários repetidos, verifique os horários.'; }
    }
    echo json_encode($response);
    exit;
}


add_action('wp_ajax_nopriv_save_events', 'save_events');
add_action('wp_ajax_save_events', 'save_events');

function save_events() {
    global $wpdb;
    $statusCadastro['status'] = false;
    $statusCadastro['response'] = "Verifique todos os campos para continuar";
    if (isset($_POST['save']) && $_POST['save'] == 'event_send') {
        $data = $_POST;
        foreach ($data as $nameData => $valueData) {
            $$nameData = $valueData;
        }

        $verify = true;
        if (strlen($name) <= 3) { $statusCadastro['response'] = 'O nome inserido não é válido'; }
        if (((int) $category) == 0) { $statusCadastro['response'] = 'O nome inserido não é válido'; }
        else if (strlen($phone) <= 7) { $statusCadastro['response'] = 'O telefone inserido não é válido'; }
        else if (strlen($email) <= 7) { $statusCadastro['response'] = 'O email inserido não é válido'; }
        else if (strlen($zip_code) <= 5) { $statusCadastro['response'] = 'O CEP inserido não é válido'; }
        else if (strlen($address) <= 3) { $statusCadastro['response'] = 'O endereço inserido não é válido'; }
        else if (strlen($city) <= 3) { $statusCadastro['response'] = 'A cidade inserida não é válida'; }
        else if (strlen($state) <= 2) { $statusCadastro['response'] = 'O estado selecionado não é válido'; }
        else if (strlen($detail) <= 50) { $statusCadastro['response'] = 'Poucos detalhes foram inseridos.'; }
        else if ($quantity <= 2) { $statusCadastro['response'] = 'Poucas pessoas para o evento.'; }
        else if ($quantity >= 100000) { $statusCadastro['response'] = 'Quantidade de pessoas ultrapassou o limite.'; }
        else { $verify = true; }

        if ($verify === true) {

            $nowDate = date("Y-m-d H:i:s");
            $zip_code = preg_replace("/[^0-9]/", "", $zip_code);
            $date = explode("/", $date);
            $date = array_reverse($date); 
            $date = implode("-", $date);
            $returnEvent = $wpdb->insert(
                'events_bookings',
                array(
                    'category_id' => $category,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip_code' => $zip_code,
                    'date' => $date,
                    'quantity' => $quantity,
                    'detail' => $detail,
                    'date_created' => $nowDate,
                    'status' => 'ativo'
                )
            );
            if ($returnEvent) {
                $statusCadastro['status'] = true;
                mailEvents($wpdb->insert_id);
            }
            else { $statusCadastro['rsponse'] = 'O evento não foi enviado, tente novamente mais tarde ou tente entrar em contato por telefone.'; }
        }
    }
    echo json_encode($statusCadastro);
    exit;
}

?>