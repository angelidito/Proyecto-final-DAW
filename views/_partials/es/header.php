<?php

$_SESSION['cookie_lang'] = 'es';

?>

<header>
    <div id="logoYTitulo">
        <a href=".."> <img src="../img/logo.png" alt="logo" id="logoCabecera" class="logo">
        </a>
        <a href="..">
            <p id="tituloWeb" class="m-0">TradúceMe</p>
        </a> <span id="botonMenu" class="m-4"> &#9776; </span>
    </div>
    <div id="cambioIdiomaEscritorio"> <a class='ES cambioIdioma'>&#x1f1ea;&#x1f1f8;</a> <a class='EN cambioIdioma'>&#x1f1ec;&#x1f1e7;</a> </div>
    <ul id="menu">
        <li> <a href="inicio.php">Inicio</a> </li>
        <li> <a href="sobremi.php">Sobre mí</a> </li>
        <li id="traduccion"> <a href="traduccion.php">Traducción</a>
            <ul id="tiposTraduccion">
                <li><a href="traduccion-jurada.php">Jurada</a></li>
                <li><a href="traduccion-juridica.php">Jurídica</a></li>
                <li><a href="traduccion-economica.php">Económica</a></li>
                <li><a href="traduccion-tecnica-y-especializada">Técnica y especializada</a></li>
                <li><a href="traduccion-audiovisual.php">Audiovisual</a></li>
                <li><a href="traduccion-de-paginas-web-y-software.php">Web y software</a></li>
            </ul>
        </li>
        <li id="otrosServicios"> <a href="otros-servicios.php">Otros servicios</a>
            <ul id="listaServicios">
                <li><a href="revision.php">Revisión de traducciones de terceros</a></li>
                <li><a href="correccion.php">Corrección de textos</a></li>
                <li><a href="transcrip&subtit.php">Transcripción y subtitulación</a></li>
                <li><a href="bbddterminologicas.php">Creación de bases terminológicas</a></li>
                <li><a href="memorias.php">Creación de memorias de traducción</a></li>
                <li><a href="asesoramiento.php">Asesoramiento lingüístico</a></li>
            </ul>
        </li>
        <li> <a href="contacto.php">Contacto</a> </li>
        <li> <a id="cambioIdiomaMovil" class='EN cambioIdioma'>Change to English version</a> </li>
    </ul>
</header>