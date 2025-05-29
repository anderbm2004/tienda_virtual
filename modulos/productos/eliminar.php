<?php
require_once __DIR__ . '/../../includes/db.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../usuarios/session.php'; // Verificar sesión

// Verificar que el usuario sea administrador
if ($_SESSION['role'] !== 'admin') {
    die("Error: No tienes permiso para realizar esta acción.");
}

require_once __DIR__ . '/../../includes/db.php';

// Verificar si se envió el ID del producto
if (isset($_GET['id'])) {
    $id_producto = (int) $_GET['id'];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();

    header("Location: listar.php?mensaje=producto_eliminado");
    exit;
} else {
    die("Error: ID de producto no válido.");
}


// Verificar que se haya pasado un ID de producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirigir al listado de productos
    header("Location: listar.php");
    exit;
} else {
    header("Location: listar.php");
    exit;
}
?>
