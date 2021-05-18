<a href="cuidado.php">Volver al backoffice</a>
<br><br>
<hr><br>

<?php
require_once '../model/Admin.php';
require_once '../model/excepciones.php';
require_once '../model/db/traduceme/conexion.php';

echo '<br>';

echo 'Anadiendo admins...<br>';

var_dump(Admin::añadirAdmin('mori', 'mori'));
var_dump(Admin::solicitarAcceso('mori', 'mori'));
echo '<br>';

var_dump(Admin::añadirAdmin('malena', 'malena'));
var_dump(Admin::solicitarAcceso('malena', 'malena'));
echo '<br>';

var_dump(Admin::añadirAdmin('maroto', 'mjuan'));
var_dump(Admin::solicitarAcceso('maroto', 'mjuan'));
























?>
<br><br>
<hr><br>
<h1 class="display-4">Prueba terminada</h1>