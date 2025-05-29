<?php
require_once __DIR__ . '/../../includes/db.php';
include_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../usuarios/session.php'; // Verificar sesión



// Verificar que el usuario sea administrador
if ($_SESSION['role'] !== 'admin') {
    die("Error: No tienes permiso para realizar esta acción.");
}

require_once __DIR__ . '/../../includes/db.php';

// Código para editar el producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = (int) $_POST['id_producto'];
    $nuevo_nombre = trim($_POST['nombre']);
    $nuevo_precio = (float) $_POST['precio'];

    $sql = "UPDATE productos SET nombre = ?, precio = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $nuevo_nombre, $nuevo_precio, $id_producto);
    $stmt->execute();

    header("Location: listar.php?mensaje=producto_actualizado");
    exit;
}

// Obtener los datos del producto para mostrar en el formulario
$id_producto = (int) $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_producto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $producto = $result->fetch_assoc();
} else {
    die("Error: Producto no encontrado.");
}


// Verificar que se haya pasado un ID de producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el producto
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    // Si no se encuentra el producto, redirigir
    if (!$producto) {
        header("Location: listar.php");
        exit;
    }
} else {
    header("Location: listar.php");
    exit;
}
?>

<h2>Editar Producto</h2>

<form action="actualizar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" step="0.01" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required><br><br>

    <label>Imagen (opcional):</label><br>
    <input type="file" name="imagen"><br><br>

    <button type="submit">Actualizar</button>
</form>

<p><a href="listar.php">← Volver al listado</a></p>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
