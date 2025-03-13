<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="../css/estilos.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
<div class="container">
    <h2>Agregar Producto</h2>
    <form action="procesar_producto.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required>

        <label for="proveedor">Proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <button type="submit">Agregar Producto</button>
    </form>
</div>

</body>
</html>
