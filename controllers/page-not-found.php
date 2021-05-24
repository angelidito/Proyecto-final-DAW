<?php

if (session_status() != 2) {
    //session has not started
    session_start();
} else {
    echo 'la sesion no estaba comenzada...';
}

if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    if ($get_lang == 'es' || $get_lang == 'en') {
        $_SESSION['cookie_lang'] = $get_lang;
    }
}

$lang = $_SESSION['cookie_lang'];
$pagina = array();
if ($lang == 'es') {
    $title = "Error 404 - Pagina no encontrada";
    $content = '<div class="m-4 p-4 "></div><h1 class="my-4 mx-auto p-4 text-center">ERROR 404</h1><h1 class="my-4 mx-auto p-4 text-center"> PÁGINA NO ENCONTRADA</h1>';
} else {
    $title = "Error 404 - Page not found";
    $content = '<div class="m-4 p-4 "></div><h1 class="my-4 mx-auto p-4 text-center">ERROR 404</h1><h1 class="my-4 mx-auto p-4 text-center"> PAGE NOT FOUND</h1>';
}



$not_found = true;
require_once "../views/plantilla.php";
