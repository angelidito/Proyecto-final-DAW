<?php

require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/db/traduceme_content/conexion.php';

$tituloPaginaAdmin = "Edita o traduce una página";
$errores = '';
$mensajeExito = '';

$conn = new Consulta();

$paginas = $conn->getPage_names();;
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
        $lang = $_POST['lang'];

        try {
            $pagina = $conn->getPaginas($page_name, $lang)[0];
        } catch (NoExistenRegistrosException $e) {
            // Si llega hasta aquí cuando se escoge una página 
            // en un idioma en el que no está creada.
            // Lo que hacemos es devolver la página en el idioma 
            // en el que sí que está, para que la pueda traducir.
            if ($lang == 'es')
                $lang_traducir = 'en';
            else
                $lang_traducir = 'es';
            // No puede no estar en ningún idioma, porque si no, no te la darían a elegir
            $pagina = $conn->getPaginas($page_name, $lang_traducir)[0];
        }

        $title = $pagina['title'];
        $content = $pagina['content'];


        $hidden_selecionar = 'hidden';
        $hidden_editar = '';
    }


    if (isset($_POST['actualizar_pagina'])) {


        $page_name = $_POST['page_name'];
        $lang = $_POST['lang'];


        $hidden_selecionar = 'hidden';
        $hidden_editar = '';


        $title = $_POST['title'];
        $content = $_POST['content'];

        $pagina = new Pagina($page_name, $lang, $title, $content);

        if ($pagina->actualizar($title, $content))
            $mensajeExito = '¡Los cambios en la página se han guardado correctamente!';
        // Si no se realiza el update es que no existe, así que la creamos
        else {
            if ($pagina->crear())
                $mensajeExito .= "Página guardada de forma exitosa.";
            else
                $errores = "Algo ha fallado... No se ha insertado nada en la base de datos. Quizá ya exista la página en el idioma selecionado.";
        }
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
            <div class="col-md-3 ">
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

            <div class="col-md-3 ">
                <div class="form-group">
                    <label for="lang_selecion">Idioma</label>
                    <select id="lang_selecion" class="form-control center text-center" name="lang">
                        <option value="es" <?php echo $lang == 'es' ? 'selected' : '' ?>>español</option>
                        <option value="en" <?php echo $lang == 'en' ? 'selected' : '' ?>>inglés</option>
                    </select>
                </div>

            </div>

            <div class="col-md-6 ">
                <div class="form-group float-right ">
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

<div id="editar-pagina" class="container mb-4 <?php echo $hidden_editar ?>">
    <form method="post" action="">
        <div class="row mb-3">
            <div class="col-md-3 ">
                <div class="form-group">
                    <label for="page_name_editar">Nombre de la página</label>
                    <input id="page_name_editar" class="form-control" type="text" name="page_name" value="<?php echo $page_name ?>" readonly>
                </div>
            </div>

            <div class="col-md-2 ">
                <div class="form-group">
                    <label for="lang_editar">Idioma</label>
                    <!-- <select id="lang_editar" class="form-control center text-center" name="lang">
                        <option value="es" <?php //echo $lang == 'es' ? 'selected' : '' 
                                            ?>>español</option>
                        <option value="en" <?php //echo $lang == 'en' ? 'selected' : '' 
                                            ?>>inglés</option>
                    </select> -->
                    <input id="lang_muestra" class="form-control" type="text" name="lang_muestra" value="<?php echo ($lang == 'es') ? "español" : "inglés" ?>" readonly>
                    <input id="lang_editar" class="d-none form-control hidden" type="text" name="lang" value="<?php echo $lang ?>" hidden readonly>

                </div>
            </div>

            <div class="col-md-3 col-lg-4 ">
                <div class="form-group">
                    <label for="title_editar">Título navegador</label>
                    <input id="title_editar" class="form-control" type="text" name="title" minlength=5 maxlength=70 value="<?php echo $title ?>">
                </div>
            </div>

            <!-- <div class="col-md-3">
                <div class="form-group float-right ">
                    <label for="">&nbsp;</label>
                </div>
            </div> -->
            <div class="col-md-4 col-lg-3 ">
                <div class="form-group float-right ">
                    <label for="">&nbsp;</label>
                    <button name="actualizar_pagina" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="submit" class="btn btn-primary">Atrás</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col ">
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea id="content" class="form-control editable" name="content" rows="30" minlength=13 maxlength=65535><?php echo $content ?></textarea>
                </div>
            </div>
        </div>

    </form>
</div>




</main>

<?php
include('_partials/pie.php');
?>