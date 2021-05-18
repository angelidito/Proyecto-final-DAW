<?php
// Control de sesión
session_start();
if (isset($_SESSION['logged_admin'])) {
    header("Location: cuidado.php");
}

// require('../modelo/db_usuarios/db/traduceme/conexion.php');
require_once '../model/Admin.php';

$errores = '';

$usuario = '';
$contraseña = '';

try {
    //Control de errores
    if (isset($_POST['acceder'])) {

        // Cogemos los datos
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];


        // if (strlen($usuario) < 1 || strlen($contraseña) < 1) {
        // }
        // Comprobamos si el usuario y la contraseña coinciden.
        if (Admin::solicitarAcceso($usuario, $contraseña)) {

            // Guardamos el usuario y su imagen en la sesión
            $_SESSION['logged_admin'] = $usuario;

            // Carga las páginas de administración
            header('Location: cuidado.php');
            exit;
        }

        $errores = "Constaseña incorrecta.";
    }
} catch (Exception $e) {
    $errores = "Constaseña incorrecta. ";
    $errores = $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Administración - TradúceMe</title>
    <!-- BootstrapCDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- jQuery, Popper.js & B4JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Mis Scripts -->
    <script src="../assets/js/general.js"></script>

    <!-- Mis Hojas de Estilos -->
    <!-- <link href="../assets/css/estructura.css" rel="stylesheet"> -->
    <link href="../assets/css/login.css" rel="stylesheet">

</head>

<body class="text-center">
    <form method="post" class="form-signin">

        <h1 class="h3 mb-4 font-weight-normal">Acceso a administración</h1>

        <label for="usuario" class="sr-only">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus="" maxlength="16">

        <label for="contraseña" class="sr-only">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" class="form-control mb-4 " placeholder="Contraseña" required>

        <div class="alert alert-danger" role="alert"><?php echo $errores ?></div>

        <p class="text-muted">admin access only</p>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="acceder">Acceder</button>

    </form>

</body>

</html>