<?php
require_once 'adminSessionControl.php';
require_once './adminFunctions.php';
require_once '../model/excepciones.php';
require_once '../model/form_control.php';
require_once '../model/pagina.php';
require_once '../model/partial.php';
require_once '../model/db/traduceme/conexion.php';

$id_admin_page = "admin_comparar";
$tituloPaginaAdmin = "¡Compara y edita! ¡O traduce!";
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

$hidden_selecionar = '';
$hidden_editar = 'hidden';
$hidden_partial = '';

try {
    //Control de errores

    if (isset($_POST['selecion_pagina'])) {

        // Cogemos los datos
        $p_name = $_POST['p_name'];

        if ($p_name != 'header' && $p_name != 'footer') {
            foreach ($conn->getPaginas($p_name) as $pagina) {
                if ($pagina['lang'] == 'es') {
                    $title_es   = $pagina['title'];
                    $content_es = $pagina['content'];
                } elseif ($pagina['lang'] == 'en') {
                    $title_en   = $pagina['title'];
                    $content_en = $pagina['content'];
                } else {
                    throw new FormException("Idioma desconocido");
                }
            }
            // Por si una de las dos no existiese en la BD
            // Se pone el contenido de la otra para que editarlo.
            if (!isset($title_en)) {
                $title_en   = $title_es;
                $content_en = $content_es;
            } elseif (!isset($title_es)) {
                $title_es   = $title_en;
                $content_es = $content_en;
            }
        } else {
            $hidden_partial = 'hidden';

            foreach ($conn->getPartials($p_name) as $pagina) {
                if ($pagina['lang'] == 'es') {
                    $content_es = $pagina['content'];
                } elseif ($pagina['lang'] == 'en') {
                    $content_en = $pagina['content'];
                } else {
                    throw new FormException("Idioma desconocido");
                }
            }
        }

        $hidden_selecionar = 'hidden';
        $hidden_editar     = '';
    }


    if (isset($_POST['actualizar_pagina'])) {
        if ($p_name == 'header' || $p_name == 'footer') {
            $hidden_partial = 'hidden';
        }
        $hidden_selecionar = 'hidden';
        $hidden_editar     = '';

        $p_name      = $_POST['p_name'];
        $content_es  = noAnnoyingTags($_POST['content_es']);
        $content_en  = noAnnoyingTags($_POST['content_en']);


        if ($p_name != 'header' && $p_name != 'footer') {
            $title_es = $_POST['title_es'];
            $title_en = $_POST['title_en'];

            $paginas = array();
            $paginas[] = new Pagina($p_name, 'es', $title_es, $content_es);
            $paginas[] = new Pagina($p_name, 'en', $title_en, $content_en);

            foreach ($paginas as  $pagina) {
                $idioma = $pagina->getIdioma();
                if ($pagina->actualizar()) {
                    $borrarCacheCode = 3;
                    $mensajeExito .= "<p class='m-0'>¡Los cambios en la página en <strong>$idioma</strong> se han guardado correctamente!</p>";
                }
                // Si no se realiza el update es que no existe, así que la creamos
                else {
                    if ($pagina->crear()) {
                        $borrarCacheCode = 3;
                        $mensajeExito .= "<p class='m-0'>¡Página en <strong>$idioma</strong> creada correctamente!</p>";
                    } else {
                        $errores .= "<p class='m-0'>Advertencia: no se ha modificado nada en la página en <strong>$idioma</strong>, por lo que no se ha guardado ningún cambio en la base de datos.</p>";
                        if ($borrarCacheCode != 3) {
                            $borrarCacheCode = 2;
                        }
                    }
                }
            }
        } else {
            $partials = array();
            $partials[] = new Partial($p_name, 'es', $content_es);
            $partials[] = new Partial($p_name, 'en', $content_en);

            foreach ($partials as  $partial) {
                $idioma = $partial->getIdioma();
                if ($partial->actualizar()) {
                    $borrarCacheCode = 3;
                    $mensajeExito .= "<p class='m-0'>¡Los cambios en la página en <strong>$idioma</strong> se han guardado correctamente!</p>";
                }
                // Si no se realiza el update es que no se ha modificado nada

                else {
                    $errores .= "<p class='m-0'>Advertencia: no se ha modificado nada en el $p_name en <strong>$idioma</strong>, por lo que no se ha guardado ningún cambio en la base de datos.</p>";
                    if ($borrarCacheCode != 3) {
                        $borrarCacheCode =  2;
                    }
                }
            }
        }
    }
} catch (FormException $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
    $borrarCacheCode = 2;
} catch (BDException $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
    $borrarCacheCode = 2;
} catch (Exception $e) {
    $errores .= "<p class='m-0'>" . $e->getMessage() . "</p>";
    $borrarCacheCode = 2;
}

if (isset($_POST['nocache'])) {
    if ($borrarCacheCode == 2) {
        $errores .= "<p class='m-0'>No se ha borrado la caché.</p>";
    } elseif (($borrarCacheCode == 1 || $borrarCacheCode == 3) && borrarCache()) {
        $mensajeExito .= "<p class='m-0'>Se ha borrado la caché.</p>";
    } else {
        $errores .= "<p class='m-0'><strong>No se ha podido borrar la caché</strong>.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar páginas</title>


    <?php
    include('_partials/cabecera.php');
    ?>


    <div id="selecionar-pagina" class="container mb-4  <?php echo $hidden_selecionar ?>">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label for="page_name_selecion">Nombre de la página</label>
                        <select id="page_name_selecion" class="form-control" name="p_name">
                            <optgroup label="Páginas">
                                <?php
                                foreach ($page_names as $name) {
                                    echo "<option " . ($name == $p_name ? 'selected' : '') . ">" . $name . "</option>";
                                }
                                ?>
                            </optgroup>
                            <optgroup label="Partes">
                                <?php
                                foreach ($partials_names as $name) {
                                    echo "<option " . ($name == $p_name ? 'selected' : '') . ">" . $name . "</option>";
                                }
                                ?>
                            </optgroup>
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


    <div id="editar-pagina" class="<?php echo $hidden_editar ?>">
        <form method="post" action="">

            <div id="editar-pagina-1" class="container my-4  ">
                <div class="form-group right sticky-top pt-2">
                    <!-- <label for="">&nbsp;</label> -->
                    <button type="submit" class="btn btn-secondary  btn-confirm">Atrás</button>
                    <button name="actualizar_pagina" type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <div class="form-group center mb-4">
                    <label for="page_name_editar">¿Qué quieres comparar?</label>
                    <input id="page_name_editar" class="form-control text-center" type="text" name="p_name"
                        value="<?php echo $p_name ?>" readonly>
                </div>
                <div class="row ">
                    <div class="col-md-6 pr-1">
                        <h2 class="">Español</h2>
                        <div class="form-group text-center <?php echo $hidden_partial ?>">
                            <label for="title_editar_es">Título navegador</label>
                            <input id="title_editar_es" class="form-control text-center " type="text" name="title_es"
                                <?php
                                                                                                                        if ($hidden_partial == '' && isset($title_es)) {
                                                                                                                            echo "minlength=5 maxlength=70 value='$title_es'";
                                                                                                                        } else {
                                                                                                                            echo $hidden_partial;
                                                                                                                        }
                                                                                                                        ?>>
                        </div>
                    </div>
                    <div class="col-md-6 pl-1">
                        <h2 class="">Inglés</h2>
                        <div class="form-group text-center <?php echo $hidden_partial ?>">
                            <label for="title_editar_en">Título navegador</label>
                            <input id="title_editar_en" class="form-control text-center" type="text" name="title_en"
                                <?php
                                                                                                                        if ($hidden_partial == '' && isset($title_es)) {
                                                                                                                            echo "minlength=5 maxlength=70 value='$title_en'";
                                                                                                                        } else {
                                                                                                                            echo $hidden_partial;
                                                                                                                        }
                                                                                                                        ?>>
                        </div>
                    </div>
                </div>
            </div>

            <div id="editar-pagina-2" class="container-fluid  ">
                <div class="row">
                    <div class="col-lg-6 pr-1">
                        <div class="form-group">
                            <label for="content_es">Contenido</label>
                            <textarea id="content_es" class="form-control editable" name="content_es" rows="30"
                                minlength=13 maxlength=65535><?php echo $content_es ?></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6 pl-1">
                        <div class="form-group">
                            <label for="content_en">Contenido</label>
                            <textarea id="content_en" class="form-control editable" name="content_en" rows="30"
                                minlength=13 maxlength=65535><?php echo $content_en ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="editar-pagina-3" class="container   ">

                <div class="form-group float-right mb-0 py-0">
                    <div class="form-group ">
                        <div class="form-check">
                            <input class="form-check-input if-checked-then-show check" type="checkbox" value=""
                                id="nocache" name="nocache">
                            <label class="form-check-label text-left " for="nocache">
                                Borrar caché
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-0">

                        <!-- <label for="">&nbsp;</label> -->
                        <button type="submit" class="btn btn-secondary btn-confirm">Atrás</button>
                        <button name="actualizar_pagina" type="submit" class="btn btn-primary">Guardar</button>

                    </div>
                </div>
        </form>
    </div>




    </main>

    <?php
    include('_partials/pie.php');
    ?>