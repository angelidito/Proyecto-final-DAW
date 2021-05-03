<?php

if (session_id() == '') {
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
    $pagina['title'] = "Error 404 - Pagina no encontrada";
    $pagina['content'] = '<div class="m-4 p-4 "></div><h1 class="my-4 mx-auto p-4 text-center">ERROR 404</h1><h1 class="my-4 mx-auto p-4 text-center"> PÁGINA NO ENCONTRADA</h1>';
} else {
    $pagina['title'] = "Error 404 - Page not found";
    $pagina['content'] = '<div class="m-4 p-4 "></div><h1 class="my-4 mx-auto p-4 text-center">ERROR 404</h1><h1 class="my-4 mx-auto p-4 text-center"> PAGE NOT FOUND</h1>';
}

require "../views/plantilla.php";