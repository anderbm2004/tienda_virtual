<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header('Location: /tienda_virtual/modulos/usuarios/login.php?error=no_sesion');
    exit;
}
?>
