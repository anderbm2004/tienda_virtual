<?php
include_once __DIR__ . '/../../includes/header.php';
?>

<h2>Agregar Producto</h2>

<form action="guardar.php" method="POST" enctype="multipart/form-data">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4" required></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <label>Imagen:</label><br>
    <input type="file" name="imagen"><br><br>

    <button type="submit">Guardar</button>
</form>

<p><a href="listar.php">← Volver al listado</a></p>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
