<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
include_once __DIR__ . '/../../includes/header.php';

// Verificar si se envió el ID del producto
if (isset($_GET['id'])) {
    $producto_id = (int) $_GET['id'];

    // Consultar los detalles del producto desde la base de datos
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    } else {
        echo "<p>Producto no encontrado.</p>";
        include_once __DIR__ . '/../../includes/footer.php';
        exit;
    }
} else {
    echo "<p>ID de producto no válido.</p>";
    include_once __DIR__ . '/../../includes/footer.php';
    exit;
}
?>

<h1>Detalles del producto</h1>
<div style="text-align: center; margin: 20px;">
    <img src="/tienda_virtual/img/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" style="max-width: 300px; border-radius: 10px; margin-bottom: 20px;">
    <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
    <p><strong>Precio:</strong> $<?php echo number_format($producto['precio'], 2); ?></p>
    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['descripcion'] ?? 'No disponible'); ?></p>
    <form action="/tienda_virtual/modulos/productos/agregar_al_carrito.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
        <button type="submit" style="padding: 10px 20px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer;">Añadir al carrito</button>
    </form>
</div>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>