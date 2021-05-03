<!-- BootstrapCDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- jQuery, Popper.js & B4JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/6bhuqx89rm55uhit2zmiyx5y2vl4pufzhuycvki63e0e7d46/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Mis Scripts -->
<script src="../assets/js/general.js"></script>

<!-- Mis Hojas de Estilos -->
<link rel="stylesheet" href="../assets/css/estructura.css">


</head>

<body>
    <header>

        <div id="logoYTitulo">
            <a href="."> <img src="../img/logo.png" alt="logo" id="logoCabecera" class="logo">
            </a>
            <a href=".">
                <p id="tituloWeb" class="m-0">Administración de páginas</p>
            </a>
            <span id="botonMenu" class="m-4"> &#9776; </span>
        </div>
        <ul id="menu">
            <li> <a href="cuidado.php">Inicio</a></li>
            <li> <a href="añadir-pagina.php">Añadir nueva</a></li>
            <li> <a href="editar-pagina.php">Editar y traducir</a></li>
            <li> <a href="info.php">Información</a></li>
            <li> <a href="..">Volver a la web</a></li>
        </ul>
    </header>

    <main class="mt-4 pt-4 center">
        <div class="container">
            <h1><?php echo $tituloPaginaAdmin ?></h1>
        </div>