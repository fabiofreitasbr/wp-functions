<?php 
function formatTel($telefone) {
    $telCaracteres = strlen($telefone);
    if ($telCaracteres == 8) {
        $telefoneFinal = substr($telefone, 0, 4) . "-" . substr($telefone, 4, 4);
        return $telefoneFinal;
    }
    else if ($telCaracteres == 9) {
        $telefoneFinal = substr($telefone, 0, 5) . "-" . substr($telefone, 5, 4);
        return $telefoneFinal;
    }
    else if ($telCaracteres == 10) {
        $telefoneFinal = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 4) . "-" . substr($telefone, 6, 4);
        return $telefoneFinal;
    }
    else if ($telCaracteres == 11) {
        $telefoneFinal = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7, 4);
        return $telefoneFinal;
    }
    else if ($telCaracteres == 13) {
        $telefoneFinal = substr($telefone, 0, 3) . " (" . substr($telefone, 3, 2) . ") " . substr($telefone, 5, 4) . "-" . substr($telefone, 9, 4);
        return $telefoneFinal;
    }
    else if ($telCaracteres == 14) {
        $telefoneFinal = substr($telefone, 0, 3) . " (" . substr($telefone, 3, 2) . ") " . substr($telefone, 5, 5) . "-" . substr($telefone, 10, 4);
        return $telefoneFinal;
    }
}
?>