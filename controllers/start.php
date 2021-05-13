<?php

require '../model/db/traduceme_content/conexion.php';
require '../model/excepciones.php';

/**
 * Provee de variables útiles y necesarias para el programa.
 *
 * @author Ángel M. M. Díez
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
                if ($val === '') {
                    $langs[$lang] = 1;
                }
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

// *****************************************
// *****************************************
// *****************************************
// ******** PREPARACIÓN DE LA CACHE ********
// *****************************************
// *****************************************
// *****************************************
$directorios = [
    '../cache/pages',
    '../cache/pages/es',
    '../cache/pages/en',
    '../cache/pages/_partials/es',
    '../cache/pages/_partials/en',
    '../cache/vars',

];
foreach ($directorios as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
        $file = fopen($dir . '/index.php', "w");
        fwrite($file, '<?php header("Location: ../"); exit;');
        fclose($file);
    }
}

$conn = new Consulta();


$cache_header = "../cache/pages/_partials/$lang/header.html";
$cache_footer = "../cache/pages/_partials/$lang/footer.html";
$cache_page = "../cache/pages/$lang/$page_name.html";

// Cargamos el header en la caché si no lo están todavía 
if (!file_exists($cache_header)) {
    // Cargamos contenido de la pagina
    try {
        $header = $conn->getPartials('header', $lang)[0];
        $file = fopen($cache_header, "w");
        fwrite($file, $header['content']);
        fclose($file);
    } catch (BDException $e) {
        echo $e->getMessage();
    }
}
// Cargamos el footer en la caché si no lo están todavía 
if (!file_exists($cache_footer)) {
    // Cargamos contenido de la pagina
    try {
        $footer = $conn->getPartials('footer', $lang)[0];
        $file = fopen($cache_footer, "w");
        fwrite($file, $footer['content']);
        fclose($file);
    } catch (BDException $e) {
        echo $e->getMessage();
    }
}


$rutaTitles = '../cache/vars/titles.php';
if (!file_exists($rutaTitles)) {
    $file = fopen($rutaTitles, "w");
    fwrite($file, '<?php $titles = [];' . PHP_EOL);
    fclose($file);
}
require $rutaTitles;
// Cargamos la página en la caché si no lo está todavía 
$t_code = $lang . '-' . $page_name;
if (!file_exists($cache_page) || !isset($titles[$t_code])) {
    try {

        $pagina = $conn->getPaginas($page_name, $lang)[0];
        $file = fopen($cache_page, "w");
        fwrite($file, $pagina['content']);
        fclose($file);

        // Guardamos el titulo de la página en la caché si no lo está ya
        if (!isset($titles[$t_code])) {
            $title = $pagina['title'];
            file_put_contents($rutaTitles,  "\$titles['$t_code'] = '$title';" . PHP_EOL, FILE_APPEND);
        }
    } catch (NoExistenRegistrosException $e) {
        // Si no existe en el idioma que se quiere, 
        // se carga el contenido del otro idioma 
        $lang = ($lang == 'es') ? 'en' : 'es';
        $cache_page = "../cache/pages/$lang/$page_name.html";
        try {
            $pagina = $conn->getPaginas($page_name, $lang)[0];
            $file = fopen($cache_page, "w");
            fwrite($file, $pagina['content']);
            fclose($file);
        } catch (NoExistenRegistrosException $e) {
            $page_name = 'asdfasdfs';
            header("Location: page-not-found.php");
            exit;
        }
    }
} else $title = $titles[$t_code];


require "../views/plantilla.php";
