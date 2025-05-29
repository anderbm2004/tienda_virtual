<?php
session_start();

if (isset($_POST['producto_id'])) {
    $producto_id = (int) $_POST['producto_id'];

    if (isset($_SESSION['carrito'][$producto_id])) {
        unset($_SESSION['carrito'][$producto_id]);
    }
}

// Redirigir de vuelta al carrito
header("Location: ver_carrito.php");
exit;
?>
