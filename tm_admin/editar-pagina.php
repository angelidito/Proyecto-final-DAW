<?php

require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/db/traduceme_content/conexion.php';

$errores = '';
$mensajeExito = '';

$conn = new Consulta();

$paginas = $conn->getPage_names();;
$page_name = '';
$lang = '';
$title = '';
$content = '';

try {
    //Control de errores
    if (isset($_POST['selecion_pagina'])) {

        // Cogemos los datos
        $page_name = $_POST['page_name'];
        $lang = $_POST['lang'];

        $pagina = $conn->getPaginas($page_name, $lang)[0];

        $title = $pagina['title'];
        $content = $pagina['content'];
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
    <title>Edición de páginas</title>
</head>


<?php
include('_partials/cabecera.php');
?>

<main class="my-4 py-4 center">

    <div id="selecionar" class="container mb-4 ">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="page_name_selecion">Nombre de la página</label>
                        <select id="page_name_selecion" class="form-control" name="page_name">
                            <optgroup label="Escoje una página">
                                <?php
                                for ($i = 0; $i < count($paginas); $i++)
                                    echo "<option>" . $paginas[$i] . "</option>";
                                ?>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="lang_selecion">Idioma</label>
                        <select id="lang_selecion" class="form-control center text-center" name="lang">
                            <optgroup label="Escoje una página">
                                <option value="es">español</option>
                                <option value="en">inglés</option>
                            </optgroup>
                        </select>
                    </div>

                </div>

                <div class="col-md-2 ">
                    <div class="form-group  float-rigth m-auto">
                        <label for="">&nbsp;</label>
                        <input name="selecion_pagina" type="submit" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <hr>

    <div id="editar" class="container mb-4 ">
        <div class="alert alert-success" role="alert"><?php echo $mensajeExito ?></div>
        <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label for="page_name_editar">Nombre de la página</label>
                        <input class="form-control" type="text" name="page_name" value="<?php echo $page_name ?>" readonly>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="form-group">
                        <label for="lang">Idioma</label>
                        <select id="lang" class="form-control center text-center" name="lang" readonly>
                            <option value="<?php $lang ?>"><?php $lang ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Título navegador</label>
                    <input id="title" class="form-control" type="text" name="title" minlength=5 maxlength=70 value="<?php echo $title ?>">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea id="content" class="form-control editable" name="content" rows="20" minlength=13 maxlength=65535><?php echo $content ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col left">
                    <div class="form-group float-right m-auto">
                        <input name="actualizar_pagina" type="submit" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>




</main>

<?php
include('_partials/pie.php');
?>