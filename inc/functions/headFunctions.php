<?php 
class headFunctions {
    public function js($valor, $metodo = true) {
        $jsPrint = ($metodo == true) ? '<script src="'. get_bloginfo('template_url') . '/js/' . $valor . '.js"></script>' : '<script src="' . $valor . '"></script>';
        echo $jsPrint;
    }
    public function css($valor, $metodo = true) {
        $cssPrint = ($metodo == true) ? '<link rel="stylesheet" href="'. get_bloginfo('template_url') . '/css/' . $valor . '.css" />' : '<link rel="stylesheet" href="' . $valor . '" />';
        echo $cssPrint;
    }
}
?>