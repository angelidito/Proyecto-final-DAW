<?php
require 'start.php';

$conn = new Consulta();

$datos = $conn->getPagina('inicio', $_SESSION['cookie_lang']);

// var_dump($datos);
$lang = $datos['lang'];
$title = $datos['title'];
$content = $datos['content'];




require "../es/plantilla.php";
