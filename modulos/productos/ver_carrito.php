<?php
session_start();
include_once __DIR__ . '/../../includes/header.php';

echo "<h2>Carrito de Compras</h2>";

// Verificar si el carrito tiene productos
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<p>Tu carrito está vacío.</p>";
} else {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Imagen</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr>";

    $total_general = 0;

    foreach ($_SESSION['carrito'] as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total_general += $subtotal;

        echo "<tr>";
        echo "<td><img src='/tienda_virtual/img/" . htmlspecialchars($producto['imagen']) . "' width='50'></td>";
        echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
        echo "<td>$" . number_format($producto['precio'], 2) . "</td>";
        echo "<td>" . $producto['cantidad'] . "</td>";
        echo "<td>$" . number_format($subtotal, 2) . "</td>";
        echo "<td>
                <form action='eliminar_del_carrito.php' method='post'>
                    <input type='hidden' name='producto_id' value='" . $producto['id'] . "'>
                    <button type='submit'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }

    echo "<tr><td colspan='4'><strong>Total general</strong></td><td colspan='2'><strong>$" . number_format($total_general, 2) . "</strong></td></tr>";
    echo "</table>";
}

include_once __DIR__ . '/../../includes/footer.php';
?>
