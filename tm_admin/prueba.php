<a href=".">Volver al backoffice</a>
<br><br>
<hr class="margarita"><br>

<?php
require '../model/user.php';
require '../model/excepciones.php';

// echo '<pre>';

$usuario = 'mori';
$contraseña = '1234';
var_dump(User::añadirAdmin($usuario, $contraseña));
var_dump(User::isAdmin($usuario, $contraseña));

// var_dump(User::isAdmin('malena', 'pollo'));

// var_dump(User::isAdmin('maroto', 'mjuan'));



// var_dump(User::isAdmin('mfdgri', 'mori'));

// var_dump(User::isAdmin('malena', 'pofgllo'));

// var_dump(User::isAdmin('', 'mjuan'));

// var_dump(User::isAdmin('mjuan', ''));

// var_dump(User::isAdmin('', ''));




















?>
<br><br>
<hr class="margarita"><br>
<h1 class="display-4">Prueba terminada</h1>