<?php

require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/db/traduceme_content/conexion.php';
require_once 'funciones.php';

$tituloPaginaAdmin = "¡Traduce una página!";
$errores = '';
$mensajeExito = '';


try {

    $conn = new Consulta();
    $paginasES = $conn->getPaginas('', 'es');
    $paginasEN = $conn->getPaginas('', 'en');

    $tablaES = tabularMatrizN($paginasES, ['Página', 'Idioma', 'Título',], 'table caption-top', 'Páginas en español');
    $tablaEN = tabularMatrizN($paginasEN, ['Página', 'Idioma', 'Título',], 'table caption-top', 'Páginas en inglés');
} catch (BDException $e) {
    $errores .= $e->getMessage();
} catch (Exception $e) {
    $errores .= $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de páginas</title>
</head>


<?php
include('_partials/cabecera.php');
?>

<div class="container">
    <div class="alert alert-success" role="alert"><?php echo $mensajeExito ?></div>
    <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>
</div>
<div class="container p-4">
    <h2 class="mb-4">Páginas en la base de datos</h2>
    <div class="row text-left">
        <div class="col-xs-12 col-md-6">
            <?php echo $tablaES ?>
            <hr>
        </div>
        <div class="col-xs-12 col-md-6 ">
            <?php echo $tablaEN ?>
            <hr>
        </div>
    </div>
</div>



</main>

<?php
include('_partials/pie.php');
?>