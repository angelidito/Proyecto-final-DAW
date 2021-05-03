<?php

require '../model/db/traduceme_content/conexion.php';
require '../model/excepciones.php';
/**
 * Provee de variables útiles y necesarias para el programa.
 */

session_start();
// Comprueba haya cookie de idioma.
if (!isset($_SESSION['cookie_lang'])) {
    $langs = array();

    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        // Divide el string en partes: codigo de idioma y prioridad
        preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
        if (count($lang_parse[1])) {
            // Crea un array con formato "codigo de idioma" => prioridad  ; Ej.: "en" => 0.8
            $langs = array_combine($lang_parse[1], $lang_parse[4]);
            // Fija la prioridad en 1 si no tiene valor
            foreach ($langs as $lang => $val) {
                if ($val === '') $langs[$lang] = 1;
            }
            // Con más idiomas me interesaría ordenarlo, pero con dos no.. arsort($langs, SORT_NUMERIC);
        }
    }

    $_SESSION['cookie_lang'] = 'es';
    // Si el navegador contempla el inglés y 
    //      ( tiene mas prioridad que el español 
    //        o no contempla el español ), 
    // entonces, redirige a la pagina en inglés
    if (isset($langs['en'])) {
        if (!isset($langs['es']) || $langs['en'] > $langs['es']) {
            $_SESSION['cookie_lang'] = 'en';
        }
    }
} // Fin del if (!isset($_COOKIE['cookie_lang']))


// Comprueba si se quiere cambiar de idioma.
if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    if ($get_lang == 'es' || $get_lang == 'en') {
        $_SESSION['cookie_lang'] = $get_lang;
        header("Location: $page_name.php");
        exit;
    }
}
$lang = $_SESSION['cookie_lang'];


echo $_SESSION['cookie_lang'];

// $dominio = '127.0.0.1/Proyecto-final-DAW';

$conn = new Consulta();

try {
    $pagina = $conn->getPaginas($page_name, $lang)[0];
} catch (NoExistenRegistrosException $e) {
    $lang = ($lang == 'es') ? 'en' : 'es';
    $pagina = $conn->getPaginas($page_name, $lang)[0];
}

require "../views/plantilla.php";
