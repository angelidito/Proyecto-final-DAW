<?php

require '../model/db/traduceme_content/conexion.php';

/**
 * Provee de variables útiles y necesarias para el programa.
 */

session_start();

// Comprueba si se ha cambiado de idioma.
if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    if ($get_lang == 'es' || $get_lang == 'en') {
        $_SESSION['cookie_lang'] = $get_lang;
    }
}

$lang = $_SESSION['cookie_lang'];

$dominio = '127.0.0.1/Proyecto-final-DAW';

$conn = new Consulta();

$pagina = $conn->getPagina($page_name, $lang);

require "../views/plantilla.php";
