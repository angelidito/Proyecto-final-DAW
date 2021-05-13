<?php
require_once 'adminSessionControl.php';

/**
 * Borra la caché.
 * 
 * Al acabar crea de nuevo únicamente el directorio pages y su index.php.
 * 
 * @param boolean $dirs_only Por defecto (`true`) borra solo directorios. Si `false`, borra también archivos
 * @return boolean `true` si la caché se ha borrado con exito; `false` si no.
 *
 * @author Ángel M. M. Díez
 */
function borrarCache($dirs_only = true)
{
    $cache_borrada = true;

    if ($files = glob('../cache/*'))  //obtenemos todos los nombres de los ficheros
        foreach ($files as $file)
            if (is_dir($file) || !$dirs_only)
                $cache_borrada = deleteDirectory($file);

    $dirPages = "../cache/pages/";
    if (!file_exists("../cache/pages/")) {
        mkdir($dirPages, 0777, true);
        $file = fopen($dirPages . '/index.php', "w");
        fwrite($file, '<?php header("Location: ../"); exit;');
        fclose($file);
    }

    return $cache_borrada;
}

/**
 * Borrar recursivamente un directorio y su contenido.
 *
 * @param string $dir Directorio a borrar.
 * @return boolean `true` si se ha borrado con exito el directorio y su contenido; `false` si no.
 */
function deleteDirectory($dir)
{
    if (!file_exists($dir))
        return true;

    if (!is_dir($dir))
        return unlink($dir);

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..')
            continue;

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item))
            return false;
    }

    return rmdir($dir);
}


/**
 * Tabula una matriz de datos.
 *
 * Si se introduce un segundo array, se usará para crear las cabeceras, 'th', de la tabla.
 *
 * @param mixed $matrizDatos Datos a tabular. Array de arrays
 * @param array $arrayCabeceras Cabeceras de la tabla.
 * @param string $clase Clases que tendrá la tabla (separadas por espacios).
 * @param string $caption Título de la tabla (etiqueta <caption>).
 *
 * @return string Texto HTML de una tabla con los datos del la matriz.
 *
 * @author Ángel M. M. Díez
 */
function tabularMatriz($matrizDatos, $arrayCabeceras = null, $clase = '', $caption = '')
{
    // Tabla
    $tabla = "<table class='$clase'>
                <caption>$caption</caption>
                <thead>";
    $maxCols = PHP_INT_MAX;

    // Encabezados
    if (is_array($arrayCabeceras)) {
        $maxCols = count($arrayCabeceras);
        $tabla .=  "<tr>";
        foreach ($arrayCabeceras as $th) {
            $tabla .=  "<th>$th</th>";
        }
        $tabla .=  "<tr>";
    }

    $tabla .= "</thead><tbody>";
    // Datos
    foreach ($matrizDatos as $fila) {
        $tabla .=  '<tr>';
        $col = 0;
        foreach ($fila as $celda) {
            if ($maxCols <= $col) {
                break;
            }
            $col++;
            $tabla .=  "<td>" . $celda . "</td>";
        }

        $tabla .=  '</tr>';
    }

    $tabla .=  "</tbody></table>";

    return $tabla;
}
/**
 * Tabula una matriz de datos.
 *
 * Si se introduce un segundo array, se usará para crear las cabeceras, 'th', de la tabla.
 *
 * @param mixed $matrizDatos Datos a tabular. Array de arrays
 * @param array $arrayCabeceras Cabeceras de la tabla.
 * @param string $clase Clases que tendrá la tabla (separadas por espacios).
 * @param string $caption Título de la tabla (etiqueta <caption>).
 *
 * @return string Texto HTML de una tabla con los datos del la matriz.
 *
 * @author Ángel M. M. Díez
 */
function tabularMatrizN($matrizDatos, $arrayCabeceras = null, $clase = '', $caption = '')
{
    // Tabla
    $tabla = "<table class='$clase'>
                <caption>$caption</caption>
                <thead>";
    $maxCol = PHP_INT_MAX;

    // Encabezados
    if (is_array($arrayCabeceras)) {
        $maxCols = count($arrayCabeceras);
        $tabla .=  "<tr>";
        $tabla .=  "<th>#</th>";
        foreach ($arrayCabeceras as $th) {
            $tabla .=  "<th>$th</th>";
        }
        $tabla .=  "<tr>";
    }

    $tabla .= "</thead><tbody>";
    // Datos
    $row = 1;
    foreach ($matrizDatos as $fila) {
        $tabla .=  '<tr><th>' . $row++ . '</th>';

        $col = 0;
        foreach ($fila as $celda) {
            if ($maxCols <= $col) {
                break;
            }
            $col++;
            $tabla .=  "<td>" . $celda . "</td>";
        }

        $tabla .=  '</tr>';
    }

    $tabla .=  "</tbody></table>";

    return $tabla;
}

/**
 * Devuelve un string de un elemento HTML img.
 *
 * La estructura del string devuelto es la siguiente: <img src='data:image/jpg; base64, CODIFICACIÓN_DE_LA_IMAGEN' alt='Texto_Alternativo'>
 *
 * @param string $encodedImg Imagen JPG codificada en base 64.
 * @param string $alt Texto alternativo de la imagen.
 *
 * @return string Texto HTML de un elemento img.
 *
 * @author Ángel M. M. Díez
 */
function HTMLImgItemFromBase64jpg($encodedImg, $alt = '')
{
    return  "<img src='data:image/jpg;charset=utf-8;base64, " . base64_encode($encodedImg) . "' alt='$alt' >";
}

/**
 * Devuelve un string de un elemento HTML img.
 *
 * La estructura del string devuelto es la siguiente: <img src='data:image/png; base64, CODIFICACIÓN_DE_LA_IMAGEN' alt='Texto_Alternativo'>
 *
 * @param string $encodedImg Imagen PNG codificada en base 64.
 * @param string $alt Texto alternativo de la imagen.
 *
 * @return string Texto HTML de un elemento img.
 *
 * @author Ángel M. M. Díez
 */
function HTMLImgItemFromBase64png($encodedImg, $alt = '')
{
    return  "<img src='data:image/png;charset=utf-8;base64, " . base64_encode($encodedImg) . "' alt='$alt' >";
}
