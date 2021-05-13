<?php

require_once 'adminSessionControl.php';
require_once 'adminFunctions.php';
require_once '../model/pagina.php';
require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/db/traduceme_content/conexion.php';

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
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
} catch (Exception $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
}

if (isset($_POST['noCache']))
    borrarCache();


$rutaCache = '../cache/pages';
if (file_exists($rutaCache))
    $fechaCache = date("d-m-Y H:i:s", filectime($rutaCache));
else
    $fechaCache = 'NO DATA';



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
            <hr class="clasic">
        </div>
        <div class="col-xs-12 col-md-6 ">
            <?php echo $tablaEN ?>
            <hr class="clasic">
        </div>
    </div>
</div>
<div class="container">
    <h2 class="mb-4 ">Caché</h2>
    <p>
        Último borrado de caché: <?php echo $fechaCache ?>.
    </p>
    <form method="post" action="">
        <div class="form-group center">
            <button name="noCache" type="submit" class="btn btn-primary">Borrar caché</button>
        </div>
    </form>
</div>



</main>

<?php
include('_partials/pie.php');
?>