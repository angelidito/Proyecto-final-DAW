<?php

require '../model/excepciones.php';
require '../model/form_control.php';
require '../model/pagina.php';
require '../model/db/traduceme_content/conexion.php';

$errores = '';
$mensajeExito = '';

$page_name = '';
$lang = '';
$title = '';
$content = '';

try {
    //Control de errores
    if (isset($_POST['enviar'])) {

        // Cogemos los datos
        $page_name = $_POST['page_name'];
        $lang = $_POST['lang'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        FormControl::checkLength($page_name, 5, 40);
        FormControl::checkLength($title, 5, 70);
        FormControl::checkLength($content, 13, 65535);


        $conn = new Consulta();
        $page = new Pagina($page_name, $lang, $title, $content);
        if ($conn->añadirPagina($page))
            $mensajeExito = "Página añadida";
        else
            $errores = "Algo ha fallado... No se ha insertado nada en la base de datos";
    }
} catch (FormException $e) {
    $errores = $e->getMessage();
} catch (Exception $e) {
    $errores = $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir página a la BD</title>
</head>



<?php
include('_partials/cabecera.php');
?>

<main class="my-4 py-4 center">

    <div class="container mb-4">

        <div class="alert alert-success" role="alert"><?php echo $mensajeExito ?></div>
        <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3">

                    <div class="form-group">
                        <label for="page_name">Nombre de la página</label>
                        <input id="page_name" class="form-control" type="text" name="page_name" minlength=5 maxlength=40 value="<?php echo $page_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="lang">Idioma</label>
                        <select id="lang" class="form-control" name="lang">
                            <option>es</option>
                            <option>en</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Título navegador</label>
                        <input id="title" class="form-control" type="text" name="title" minlength=5 maxlength=70 value="<?php echo $title ?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea id="content" class="form-control" name="content" rows="20" minlength=13 maxlength=65535><?php echo $content ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col left">
                    <div class="form-group float-right m-auto">
                        <input name="enviar" type="submit" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>


</main>

<?php
include('_partials/pie.php');
?>