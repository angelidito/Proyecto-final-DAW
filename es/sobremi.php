<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "tÍtULo"; ?></title>


    <?php
    include('_partials/cabecera.html');
    ?>


    <nav class=" m-0 py-0  w-100 fg">
        <ul class="breadcrumb">
            <li> <a href="..">Inicio</a> </li>
            <li> <a href="#">Sobre mí</a> </li>
        </ul>
    </nav>

    <main class="flex-c">


        <div id="tituloPagina" class="">

            <h1 class="">Sobre mí: Malena</h1>

        </div>


        <div id='cuerpo' class="m-4 row d-flex  flex-wrap justify-content-center">

            <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 center ">
                <img src="../img/orla.jpeg" alt="Orla" class='img-fluid sticky-top my-4'>
            </div>


            <div id="textoCuerpo" class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-8 my-4">

                <h2 class=" ">¡Hola!</h2>
                <p>
                    Me llamo Malena Martínez Díez y soy filóloga, traductora y profesora de lenguas. Todo ello por vocación.
                </p>

                <p>
                    Me encantan tanto los idiomas y como la enseñanza, desde pequeña ya apuntaba maneras.
                </p>

                <p>
                    Desde que acabé el instituto, no he parado de estudiar para conseguir un grado y dos másteres universitarios:
                </p>
                <ul class=" list pl-4 ">
                    <li> Grado en Estudios Ingleses, Universidad de Valladolid. </li>
                    <li> Máster en Traducción Institucional, Universidad de Alicante </li>
                    <li> Máster en Enseñanza de Español como Lengua Extranjera, Universidad de Burgos. </li>
                </ul>

                <h2 class=" ">Otros estudios</h2>
                <ul class=" list-unstyled ">
                    <li> Curso de traducción de contenidos audiovisuales para plataformas VOD EN-ES </li>
                </ul>
            </div>


        </div>
    </main>

    <?php
    include('_partials/pie.html');
    ?>