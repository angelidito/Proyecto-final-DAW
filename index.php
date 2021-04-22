<?php

session_start();
// Si ya hay idioma en la sesión
if (isset($_SESSION['cookie_lang'])) {

    if ($_SESSION['cookie_lang'] == 'es') {

        $_SESSION['cookie_lang'] = 'es';
        header("Location: es/");

        exit;
    }

    $_SESSION['cookie_lang'] = 'en';
    header("Location: en/");

    exit;
}

// Si no...
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

        // Con más idiomas me interesaría ordenarlo, pero con dos no..
        // arsort($langs, SORT_NUMERIC);
    }
}

var_dump($langs);
// exit;

// Si el navegador contempla el inglés y 
//      este tiene mas prioridad que el español 
//      o no contempla el español, 
// entones, redirige a la pagina en inglés
if (isset($langs['en'])) {

    $en_priority = $langs['en'];

    if (isset($langs['es'])) {

        $es_priority = $langs['es'];

        if ($es_priority > $en_priority) {
            header("Location: es/");
            exit;
        }
    }

    header("Location: en/");
    exit;
}


// Si no si el español tiene mas prioridad que el ingles
// habrá entrado antes en un header. 
// Entonces sólo nos queda la opción de que no comtemplaba en inglés. 
header("Location: es/");
exit;
