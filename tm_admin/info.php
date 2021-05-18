<?php
$asdf = 1;
$asdf = 1;
$asdf = 1;
$asdf = 1;
require_once 'adminSessionControl.php';
require_once 'adminFunctions.php';
require_once '../model/pagina.php';
require_once '../model/excepciones.php';
require_once '../model/db/traduceme/conexion.php';
require_once '../model/Admin.php';

$tituloPaginaAdmin = "En resumen";
$errores = '';
$mensajeExito = '';
$conn = new Consulta();
Admin::generarAccesosJSON();

try {
    $paginasES = $conn->getPaginas('', 'es');
    $paginasEN = $conn->getPaginas('', 'en');

    $tablaES = tabularMatrizN($paginasES, ['Página', 'Idioma', 'Título',], 'table caption-top', 'Páginas en español');
    $tablaEN = tabularMatrizN($paginasEN, ['Página', 'Idioma', 'Título',], 'table caption-top', 'Páginas en inglés');
} catch (BDException $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
} catch (Exception $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
}

if (isset($_POST['noCache'])) {
    if (borrarCache())
        $mensajeExito .= "<p class='m-0'>Caché borrada correctamente</p>";
    else
        $errores .= "<p class='m-0'>No se ha logrado borrar la caché</p>";
}


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
    <script src="../assets/js/paginaInfo.js"></script>


    <?php
    include('_partials/cabecera.php');
    ?>

    <div class="container">
        <div class="alert alert-success" role="alert"><?php echo $mensajeExito ?></div>
        <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>
    </div>

    <div class="container mt-4">
        <h2 class="mb-4">Páginas en la base de datos</h2>
        <div class="row text-left">
            <div class="col-xs-12 col-md-6">
                <?php echo $tablaES ?>
                <hr class="clasic mb-0">
            </div>
            <div class="col-xs-12 col-md-6 ">
                <?php echo $tablaEN ?>
                <hr class="clasic mb-0">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="mb-4 ">Rendimiento: memoria en caché</h2>
        <p>
            Último borrado de caché: <?php echo $fechaCache ?>.
        </p>
        <form method="post" action="">
            <div class="form-group center">
                <button name="noCache" type="submit" class="btn btn-primary mb-2">Borrar caché</button>
            </div>
        </form>
        <hr class="clasic mt-4">
    </div>

    <div class="container mt-4">
        <h2 class="mb-4 ">Accesos administración</h2>
        <p>
            lorem impusm lousm lorusm loreem impusm lorem iorreem impmpuusm lormpusm lorem impusmpum lorem impusm lorem impusm lororem impusm lorem immpupusm lorusm loem impmpuusm
        </p>
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha y hora</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody id="tabla-accesos">
            </tbody>
        </table>
        <select id="select-accesos" class="form-control ml-auto" name="lang">
            <option>1</option>
            <option>2</option>
        </select>
        <hr class="clasic mt-4">
    </div>

    <div class="container mt-4">
        <h2 class="mb-4 ">Contacta con el desarrollador</h2>
        <p>
        <ul class="list-unstyled">
            <li><a href="https://twitter.com/angelidito">Ángel Mori Martínez Díez</a></li>
            <li><a class="telefono" href="https://wa.me/34608291590?text=&iexcl;Hola%21%20Tengo%20tengo%20un%20problema%20con%20la%20web&hellip;">+34 608 29 15 90</a></li>
            <li><a class="email" href="mailto:angel.mtnez.diez@gmail.com">angel.mtnez.diez@gmail.com</a></li>
        </ul>
        </p>
    </div>


    </main>

    <?php
    include('_partials/pie.php');
    ?>