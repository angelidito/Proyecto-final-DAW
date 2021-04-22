<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <?php
    include('_partials/cabecera.php');
    ?>

    <nav class=" m-0 py-0 w-100 fg">
        <ul class="breadcrumb">
            <li>
                <a href="../..">Inicio</a>
            </li>
            <li>
                <a href=".">Traducción</a>
            </li>
        </ul>
    </nav>


    <main class="flex-c">



        <div id="tituloPagina" class="">

            <h1 class="">Servicios de Traducción</h1>

        </div>


        <div id="cuerpo-1" class="cuerpo container-fluid my-4">
            <!--   d-flex flex-wrap justify-content-center   -->
            <div id="tipos-traducciones" class="container-fluid">

                <div class="cuadricula row m-0  w-100 justify-content-center">
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="jurada.html" class="divEnlace"></a>
                        <h2>Traducción jurada</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Una breve explicación</li>
                            <li>de dos</li>
                            <li>o tres lineas no demasiado largas, por favor</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="juridica.html" class="divEnlace"></a>
                        <h2>Traducción jurídica</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Lorem ipsum dolor sit amet consectetur </li>
                            <li>adipisicing elit cupiditate .</li>
                            <li>adipia in veniam sunt iure.</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="economica.html" class="divEnlace"></a>
                        <h2>Traducción económica</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Una breve explicación</li>
                            <li>de dos lineas</li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="tec&esp.html" class="divEnlace"></a>
                        <h2>Traducción técnica y especializada</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Una breve explicación</li>
                            <li>de dos</li>
                            <li>o tres lineas no demasiado largas, por favor</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="audiovisual.html" class="divEnlace"></a>
                        <h2>Traducción audiovisual</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Lorem ipsum dolor sit amet consectetur </li>
                            <li>adipisicing elit cupiditate .</li>
                            <li>adipia in veniam sunt iure.</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5 col-sm-9 col-12 m-4 p-4 divEnlace">
                        <a href="webYSoftware.html" class="divEnlace"></a>
                        <h2>Traducción de páginas web y software</h2>
                        <ul class="list-unstyled mb-0">
                            <li>Una breve explicación</li>
                            <li>de dos lineas</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <!-- fin de .row -->
            </div>

        </div>

        <hr>

        <div id="cuerpo-2" class="cuerpo container-fluid my-4">

            <div id="otros-servicios" class="container mb-4 ">
                <h2 class="center">¿Qué otros servicios se ofrecen?
                </h2>
                <ul class="list-inline center ">
                    <li class="list-inline-item">Revisión de traducciones de terceros</li>
                    <li class="list-inline-item">Corrección de textos</li>
                    <li class="list-inline-item">Transcripción y subtitulación</li>
                    <li class="list-inline-item">Creación de bases terminológicas</li>
                    <li class="list-inline-item">Creación de memorias de traducción</li>
                    <li class="list-inline-item">Asesoramiento lingüistico</li>

                </ul>
            </div>



        </div>
    </main>
    <?php
    include('_partials/pie.php');
    ?>