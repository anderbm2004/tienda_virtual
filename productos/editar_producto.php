<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "SELECT * FROM producto WHERE codigo_producto = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit();
    }
} else {
    echo "ID no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/estilos.css">

    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
<div class="container">
    <h2>Editar Producto</h2>
    <form action="procesar_editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['codigo_producto']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $row['categoria']; ?>" required>

        <label for="proveedor">Proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" value="<?php echo $row['proveedor']; ?>" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $row['precio']; ?>" required>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo $row['stock']; ?>" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>

        <button type="submit">Guardar Cambios</button>
    </form>
</div>

</body>
</html>
