<?php

require_once '../model/excepciones.php';
require_once '../model/pagina.php';

$tituloPaginaAdmin = "Añade una página";
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

        $pagina = new Pagina($page_name, $lang, $title, $content);


        // El control de formulario se lleva a cabo el constructor de página
        if ($pagina->crear()) {
            $mensajeExito .= "Página guardada de forma exitosa.";
            if (isset($_POST['crear'])) {
                $pagina->crear("../controllers");
            }
        } else {
            $errores = "Algo ha fallado... No se ha insertado nada en la base de datos. Quizá ya exista la página en el idioma selecionado.";
        }
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
                        <option value="es">español</option>
                        <option value="en">inglés</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Título navegador</label>
                    <input id="title" class="form-control" type="text" name="title" minlength=5 maxlength=70 value="<?php echo $title ?>">
                </div>
                <div class="form-group">
                    <div class="form-check mb-0">
                        <input class="form-check-input if-checked-then-show check" type="checkbox" value="" id="crear" name="crear">
                        <label class="form-check-label " for="crear">
                            Quiero que página sea accesible desde la web
                        </label>
                    </div>
                    <div class="alert alert-secondary if-checked-then-show showme" for="crear" role="alert">
                        <small id="texto-crear-pagina" class="add-content-after">Se creará: ../controllers/<wbr></small>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- <div class=" float-right">
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="" id="editable" name="">
                            <label for="editable">Editable</label>
                        </div>
                    </div> -->
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea id="content" class="form-control " name="content" rows="20" minlength=13 maxlength=65535><?php echo $content ?></textarea>
                </div>
                <!--<textarea id="content" class="form-control editable" name="content" rows="20" minlength=13 maxlength=65535>-->
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