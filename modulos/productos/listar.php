<?php
require_once __DIR__ . '/../usuarios/session.php'; // Verificar sesión
require_once __DIR__ . '/../../includes/db.php';
include_once __DIR__ . '/../../includes/header.php';

// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<h1>Lista de productos</h1>

<?php if ($_SESSION['role'] === 'admin'): ?>
    <!-- Botón para agregar productos -->
    <a href="/tienda_virtual/modulos/productos/agregar.php" style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: green; color: white; text-decoration: none; border-radius: 5px;">
        ➕ Agregar Producto
    </a>
<?php endif; ?>

<?php if ($result && $result->num_rows > 0): ?>
    <ul style="list-style: none; padding: 0;">
        <?php while ($prod = $result->fetch_assoc()): ?>
            <li style="margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                <!-- Enlace al detalle del producto -->
                <a href="/tienda_virtual/modulos/productos/detalle_producto.php?id=<?php echo $prod['id']; ?>" style="text-decoration: none; color: inherit;">
                    <strong><?php echo htmlspecialchars($prod['nombre']); ?></strong><br>
                    <img src="/tienda_virtual/img/<?php echo htmlspecialchars($prod['imagen']); ?>" alt="<?php echo htmlspecialchars($prod['nombre']); ?>" style="max-width: 150px; max-height: 150px; object-fit: contain; border-radius: 5px; margin-top: 10px;">
                    <p>$<?php echo number_format($prod['precio'], 2); ?></p>
                </a>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="/tienda_virtual/modulos/productos/editar.php?id=<?php echo $prod['id']; ?>">Editar</a> |
                    <a href="/tienda_virtual/modulos/productos/eliminar.php?id=<?php echo $prod['id']; ?>">Eliminar</a>
                <?php else: ?>
                    <form action="/tienda_virtual/modulos/productos/agregar_al_carrito.php" method="POST">
                        <input type="hidden" name="id_producto" value="<?php echo $prod['id']; ?>">
                        <button type="submit">Agregar al carrito</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No hay productos disponibles en este momento.</p>
<?php endif; ?>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
