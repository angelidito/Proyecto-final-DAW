<?php
if (session_status() != 2) {
    session_start();
}

if (isset($_GET['cerrarSesion'])) {
    unset($_SESSION['logged_admin']);
}

if (!isset($_SESSION['logged_admin'])) {
    header("Location: .");
    exit;
}