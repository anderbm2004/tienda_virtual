<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calcular la cantidad total de productos en el carrito
$carrito_cantidad = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $carrito_cantidad += $producto['cantidad'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
    <!-- Enlace a tu CSS -->
    <link rel="stylesheet" href="/tienda_virtual/css/estilos.css">
</head>
<body>
    <header>
        <h1>Mi Tienda Virtual</h1>
        <nav>
            <a href="/tienda_virtual/index.php">Inicio</a>
            <a href="/tienda_virtual/modulos/productos/listar.php">Productos</a>
            <?php if (isset($_SESSION['id'])): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
                <a href="/tienda_virtual/modulos/usuarios/logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="/tienda_virtual/modulos/usuarios/login.php">Iniciar sesión</a>
            <?php endif; ?>
            <a href="/tienda_virtual/modulos/productos/ver_carrito.php" style="margin-left: 20px;">
                🛒 Ver Carrito 
                <?php if ($carrito_cantidad > 0): ?>
                    <span style="background-color: red; color: white; border-radius: 50%; padding: 2px 8px; font-size: 14px;">
                        <?php echo $carrito_cantidad; ?>
                    </span>
                <?php endif; ?>
            </a>
        </nav>
        <hr>
    </header>
    <main>
