<?php
// Este fichero contiene tres funciones nada más.
// A la primera se le llama en control_select.php y control_update.php
// A la segunda, sólamente en control_menu.php.
// Podría haberla escrito sólamente ahí, pero me pareció
// interesante usar un fichero como una "librería".
// La tercera no la uso, la creé al plantearme admitir también imágenes PNG en la BD


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
