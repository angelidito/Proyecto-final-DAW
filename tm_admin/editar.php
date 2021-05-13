<?php
require_once 'adminSessionControl.php';
require_once './adminFunctions.php';
require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/partial.php';
require_once '../model/db/traduceme_content/conexion.php';

$id_admin_page = "admin_editar";
$tituloPaginaAdmin = "¡Edita una página! ¡O traduce!";
$errores = '';
$mensajeExito = '';
/**
 * 0 - No se ha pedido borrar
 * 1 - Petición de borrar
 * 2 - No borrar
 * 3 - Borrar (código especial para comparar.php)
 */
$borrarCacheCode = isset($_POST['nocache']) ? 1 : 0;

$conn = new Consulta();

$page_names = $conn->getPage_names();
$partials_names = $conn->getPartial_names();

$p_name = isset($_POST['p_name']) ? $_POST['p_name'] : '';
$lang = isset($_POST['lang']) ? $_POST['lang'] : '';
$title = '';
$content = '';

$hidden_selecionar = '';
$hidden_editar = 'hidden';
$hidden_partial = '';

try {
    //Control de errores
    if (isset($_POST['selecion_pagina'])) {

        // Cogemos los datos
        $p_name = $_POST['p_name'];
        $lang = $_POST['lang'];

        if ($p_name != 'header' && $p_name != 'footer') {
            try {
                $pagina = $conn->getPaginas($p_name, $lang)[0];
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
                $pagina = $conn->getPaginas($p_name, $lang_traducir)[0];
            }

            $title = $pagina['title'];
            $content = $pagina['content'];
        } else {

            $hidden_partial = 'hidden';
            $partial = $conn->getPartials($p_name, $lang)[0];

            $content = $partial['content'];
        }


        $hidden_selecionar = 'hidden';
        $hidden_editar = '';
    }


    if (isset($_POST['actualizar_pagina'])) {


        $p_name = $_POST['p_name'];
        $lang = $_POST['lang'];
        $content = $_POST['content'];

        if ($p_name != 'header' && $p_name != 'footer') {
            $title = $_POST['title'];

            $pagina = new Pagina($p_name, $lang, $title, $content);

            if ($pagina->actualizar())
                $mensajeExito .= "<p class='m-0'>¡Los cambios en la página se han guardado correctamente!</p>";
            // Si no se realiza el update es que no existe o que no se ha modificado nada, así que la creamos
            else {
                if ($pagina->crear())
                    $mensajeExito .= "<p class='m-0'>¡Página creada correctamente!</p> ";
                else
                    $errores .= "<p class='m-0'>Advertencia: no se ha modificado nada, por lo que no se ha guardado ningún cambio en la base de datos</p> ";
            }
        } else {
            $hidden_partial = 'hidden';

            $partial = new Partial($p_name, $lang, $content);

            if ($partial->actualizar())
                $mensajeExito .= "<p class='m-0'>¡Los cambios en la página se han guardado correctamente!</p>";
            // Si no se realiza el update es que no existe o que no se ha modificado nada.
            else
                $errores .= "<p class='m-0'>Advertencia: no se ha modificado nada, por lo que no se ha guardado ningún cambio en la base de datos</p> ";
        }


        $hidden_selecionar = 'hidden';
        $hidden_editar = '';
    }
} catch (FormException $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
} catch (BDException $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
} catch (Exception $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
}
if ($errores != '')
    $borrarCacheCode = 2;

if (isset($_POST['nocache'])) {
    if ($borrarCacheCode == 2)
        $errores .= "<p class='m-0'>No se ha borrado la caché.</p>";
    else if ($borrarCacheCode == 1 && borrarCache())
        $mensajeExito .= "<p class='m-0'>Se ha borrado la caché.</p>";
    else
        $errores .= "<p class='m-0'><strong>No se ha podido borrar la caché</strong>.</p>";
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
                    <label for="p_name_selecion">¿Qué quieres editar?</label>
                    <select id="p_name_selecion" class="form-control" name="p_name">
                        <optgroup label="Páginas">
                            <?php
                            foreach ($page_names as $name)
                                echo "<option " . ($name == $p_name ? 'selected' : '') . ">" . $name . "</option>";
                            ?>
                        </optgroup>
                        <optgroup label="Partes">
                            <?php
                            foreach ($partials_names as $name)
                                echo "<option " . ($name == $p_name ? 'selected' : '') . ">" . $name . "</option>";
                            ?>
                        </optgroup>
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
                    <label for="p_name_editar">Nombre de la página</label>
                    <input id="p_name_editar" class="form-control" type="text" name="p_name" value="<?php echo $p_name ?>" readonly>
                </div>
            </div>

            <div class=" <?php echo $hidden_partial == '' ? "col-md-2" : "col-md-3" ?>">
                <div class="form-group">
                    <label for="lang_editar">Idioma</label>
                    <input id="lang_muestra" class="form-control" type="text" name="lang_muestra" value="<?php echo ($lang == 'es') ? "español" : "inglés" ?>" readonly>
                    <input id="lang_editar" class="d-none form-control hidden" type="text" name="lang" value="<?php echo $lang ?>" hidden readonly>

                </div>
            </div>

            <div class="col-md-3 col-lg-4 <?php echo $hidden_partial ?>">
                <div class="form-group">
                    <label for="title_editar">Título navegador</label>
                    <input id="title_editar" class="form-control" type="text" name="title" <?php echo $hidden_partial == '' ? "minlength=5 maxlength=70 value='$title'" : $hidden_partial; ?>>
                </div>
            </div>

            <div class=" <?php echo $hidden_partial == '' ? "col-md-4 col-lg-3" : "col-md-6" ?>  ">
                <div class="form-group float-right ">
                    <label for="">&nbsp;</label>
                    <button name="actualizar_pagina" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="submit" class="btn btn-secondary  btn-confirm" name="lalaland">Atrás</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 ">
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea id="content" class="form-control editable" name="content" rows="30" minlength=13 maxlength=65535><?php echo $content ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col form-group ">
                <div class="form-check float-right">
                    <input class="form-check-input if-checked-then-show check" type="checkbox" value="" id="nocache" name="nocache">
                    <label class="form-check-label text-left " for="nocache">
                        Borrar caché
                    </label>
                </div>
            </div>
        </div>

    </form>
</div>




</main>

<?php
include('_partials/pie.php');
?>