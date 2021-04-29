<a href=".">Volver al backoffice</a>
<br><br>
<hr class="margarita"><br>

<?php

// echo '<pre>';
require_once '../model/db/traduceme_content/conexion.php';

$conn = new Consulta();

// print_r($conn->getPaginas(null, 'es'));
var_dump($conn->getPaginas());
// var_dump($conn->getPage_names());






















?>