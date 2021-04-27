<?php

$_SESSION['cookie_lang'] = 'es';

?>


<!-- BootstrapCDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- jQuery, Popper.js & B4JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>


<!-- Mis Hojas de Estilos -->
<link rel="stylesheet" href="../assets/css/estructura.css">

<!-- Mis Scripts -->
<script src="../assets/js/general.js"></script>

</head>

<body>
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