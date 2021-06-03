<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>


    <?php
    include('_partials/cabecera.php');
    ?>

    <nav class=" m-0 py-0  w-100 fg">
        <ul class="breadcrumb">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="#">Sobre m&iacute;</a></li>
        </ul>
    </nav>
    <!-- <textarea id="my-textarea" class="form-control" name="" rows="3"> -->
    <main class="flex-c">
        <div id="tituloPagina" class="">
            <h1 class="">About me: Malena</h1>
        </div>
        <div id="cuerpo" class="m-4 row d-flex  flex-wrap justify-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center ">
                <img class="img-fluid sticky-top  py-4 " src="../img/orla.jpeg" alt="Orla" />
            </div>


            <div id="textoCuerpo" class="container my-4 mx-0 col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 ">
                <h2 class=" ">Hello!</h2>
                <p>Me llamo Malena Mart&iacute;nez D&iacute;ez y soy fil&oacute;loga, traductora y profesora de lenguas. Todo ello por vocaci&oacute;n.</p>
                <p>Me encantan tanto los idiomas y como la ense&ntilde;anza, desde peque&ntilde;a ya apuntaba maneras.</p>
                <p>Desde que acab&eacute; el instituto, no he parado de estudiar para conseguir un grado y dos m&aacute;steres universitarios:</p>
                <ul class=" list pl-4 ">
                    <li>Grado en Estudios Ingleses, Universidad de Valladolid.</li>
                    <li>M&aacute;ster en Traducci&oacute;n Institucional, Universidad de Alicante</li>
                    <li>M&aacute;ster en Ense&ntilde;anza de Espa&ntilde;ol como Lengua Extranjera, Universidad de Burgos.
                    </li>
                </ul>
                <h2 class=" ">Otros estudios</h2>
                <ul class=" list-unstyled ">
                    <li>Curso de traducci&oacute;n de contenidos audiovisuales para plataformas VOD EN-ES</li>
                </ul>
                <h2>Mas cosas...</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!</p>
            </div>
        </div>
    </main>


    <!-- </textarea> -->
    <?php
    include('_partials/pie.php');
    ?>