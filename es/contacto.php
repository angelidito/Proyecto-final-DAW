<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mí</title>


    <?php
    include('_partials/cabecera.php');
    ?>




    <nav class="breadcrumb m-0 py-0  w-100 fg">
        <ul class="breadcrumb">
            <li>
                &nbsp;<a href="..">Inicio</a>
            </li>
            <li>
                <a href="#">Contacto</a>
            </li>
        </ul>
    </nav>


    <main class="flex-c">



        <div id="tituloPagina" class="m-0 w-100">

            <h1 class="display-3 p-5 m-0">Contacto</h1>

        </div>


        <div id="cuerpo" class="cuerpo m-4 text-center d-flex flex-wrap justify-content-center ">

            <div id="bloque-texto-contacto" class="p-4 align-self-start w-50 ">
                <h2 class="">¿Necesitas más información?</h2>
                <p>
                    Escríbeme un correo, llámame o mándame un mensaje de Whatsapp y te responderé lo antes posible.
                </p>
            </div>


            <address id="bloque-datos-contacto" class="container p-4 w-50  align-self-start">
                <h2 class="">Aquí estoy</h2>
                <!-- <p class="my-1">Escríbeme y te responeré lo antes posible:</p> -->
                <ul class="list-unstyled">
                    <li> Malena Martínez Díez </li>
                    <li> <a href="mailto:malena.traduceme@gmail.com" class="email">
                            malena.traduceme@gmail.com
                        </a> </li>
                    <li> <a href="https://wa.me/34646894066?text=¡Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo…" target="_blank" class="telefono">
                            +34 646 89 40 66</a> </li>
                    <li><span class="chincheta"> Burgos, España</span> </li>
                </ul>
            </address>
        </div>
    </main>

    <?php
    include('_partials/pie.php');
    ?>