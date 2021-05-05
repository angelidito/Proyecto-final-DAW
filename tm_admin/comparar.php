<?php

require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/db/traduceme_content/conexion.php';

$tituloPaginaAdmin = "¡Compara y edita! ¡O traduce!";
$errores = '';
$mensajeExito = '';

$conn = new Consulta();

$paginas = $conn->getPage_namesEN_ES();;
$page_name = '';
$lang = '';
$title = '';
$content = '';

$hidden_selecionar = '';
$hidden_editar = 'hidden';

try {
    //Control de errores
    if (isset($_POST['selecion_pagina'])) {

        // Cogemos los datos
        $page_name = $_POST['page_name'];

        $paginas = $conn->getPaginas($page_name);

        $pagina_izq = $paginas[1];
        if (count($paginas) < 2)
            $pagina_drch = $pagina_izq;
        else
            $pagina_drch =  $paginas[0];

        $hidden_selecionar = 'hidden';
        $hidden_editar = '';
    }


    if (isset($_POST['actualizar_pagina'])) {


        $page_name = $_POST['page_name'];


        $hidden_selecionar = 'hidden';
        $hidden_editar = '';


        // $title = $_POST['title'];
        // $content = $_POST['content'];

        // $pagina = new Pagina($page_name, $lang, $title, $content);

        // if ($pagina->actualizar($title, $content))
        //     $mensajeExito = '¡Los cambios en la página se han guardado correctamente!';
        // // Si no se realiza el update es que no existe, así que la creamos
        // else {
        //     if ($pagina->crear())
        //         $mensajeExito .= "Página guardada de forma exitosa.";
        //     else
        //         $errores = "Algo ha fallado... No se ha insertado nada en la base de datos. Quizá ya exista la página en el idioma selecionado.";
        // }
    }
} catch (FormException $e) {
    $errores = $e->getMessage();
} catch (BDException $e) {
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


<div id="selecionar-pagina" class="container mb-4  <?php echo $hidden_selecionar ?>">
    <form method="post" action="">
        <div class="row">
            <div class="col-md-4 ">
                <div class="form-group">
                    <label for="page_name_selecion">Nombre de la página</label>
                    <select id="page_name_selecion" class="form-control" name="page_name">
                        <?php
                        for ($i = 0; $i < count($paginas); $i++)
                            echo "<option>" . $paginas[$i] . "</option>";
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="form-group float-left ">
                    <label for="">&nbsp;</label>
                    <button name="selecion_pagina" type="submit" class="btn btn-primary">Selecionar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="alertas" class="container">
    <div class="alert alert-success" role="alert"><?php echo $mensajeExito ?></div>
    <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>
</div>

<form method="post" action="">

    <div id="editar-pagina-1" class="container my-4 <?php echo $hidden_editar ?>">
        <div class="form-group center">
            <label for="page_name_editar">Nombre de la página</label>
            <input id="page_name_editar" class="form-control text-center" type="text" name="page_name" value="<?php echo $page_name ?>" readonly>
        </div>
        <div class="row ">
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="title_editar_izq">Título navegador<?php echo $pagina_izq['lang'] ?></label>
                    <input id="title_editar_izq" class="form-control" type="text" name="title_izq" minlength=5 maxlength=70 value="<?php echo $pagina_izq['title'] ?>">
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="title_editar_drch">Título navegador<?php echo $pagina_izq['lang'] ?></label>
                    <input id="title_editar_drch" class="form-control" type="text" name="title_drch" minlength=5 maxlength=70 value="<?php echo $pagina_drch['title'] ?>">
                </div>
            </div>
        </div>

        <div id="editar-pagina-2" class="container-fluid <?php echo $hidden_editar ?>">

            <div class="row">
                <div class="col-lg-6 pr-0">
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea id="content" class="form-control editable" name="content" rows="30" minlength=13 maxlength=65535><?php echo $pagina_izq['content'] ?></textarea>
                    </div>
                </div>

                <div class="col-lg-6 pl-0">
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea id="content" class="form-control editable" name="content_drch" rows="30" minlength=13 maxlength=65535><?php echo $pagina_drch['content'] ?></textarea>
                    </div>
                </div>
            </div>

        </div>

        <div id="editar-pagina-3" class="container mb-4 <?php echo $hidden_editar ?>">
            <div class="form-group float-right ">
                <!-- <label for="">&nbsp;</label> -->
                <button name="actualizar_pagina" type="submit" class="btn btn-primary">Guardar</button>
                <button type="submit" class="btn btn-primary">Atrás</button>
            </div>

        </div>
</form>




</main>

<?php
include('_partials/pie.php');
?>