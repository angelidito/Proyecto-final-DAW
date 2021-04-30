<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagina['title'] ?></title>


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

    <?php
    include '_partials/' . $lang . '/header.php';

    // echo $_SERVER['SERVER_NAME'];
    // echo $_SERVER['HTTP_HOST'];
    // iclude BREADCRUMB y MAIN

    echo  $pagina['content'];

    include '_partials/' . $lang . '/footer.php';
    ?>


</body>

</html>