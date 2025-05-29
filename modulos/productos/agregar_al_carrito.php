<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';

// Verificar si se envió el ID del producto
if (isset($_POST['id_producto'])) {
    $producto_id = (int) $_POST['id_producto'];

    // Consultar los datos del producto desde la base de datos
    $sql = "SELECT id, nombre, precio, imagen FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();

        // Inicializar el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si el producto ya está en el carrito, incrementar cantidad
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad'] += 1;
        } else {
            // Agregar nuevo producto al carrito
            $_SESSION['carrito'][$producto_id] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => 1
            ];
        }

        // Redirigir de vuelta al listado con un mensaje de éxito
        header("Location: /tienda_virtual/index.php?mensaje=producto_agregado");
        exit;
    } else {
        // Producto no encontrado
        header("Location: /tienda_virtual/index.php?error=producto_no_encontrado");
        exit;
    }
} else {
    // ID de producto no válido
    header("Location: /tienda_virtual/index.php?error=id_no_valido");
    exit;
}
?>
