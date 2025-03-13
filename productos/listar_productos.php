<?php
include '../db.php'; 

$query = "SELECT * FROM producto"; 
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h2>Lista de Productos</h2>
    <table border="1">
    
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Categoría</th>
    <th>Proveedor</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Descripción</th>
    <th>Acciones</th> <!-- Nueva columna -->
</tr>
<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['codigo_producto']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['categoria']; ?></td>
    <td><?php echo $row['proveedor']; ?></td>
    <td><?php echo $row['precio']; ?></td>
    <td><?php echo $row['stock']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>
    <td>
    
    <a href="editar_producto.php?id=<?php echo $row['codigo_producto']; ?>" class="btn btn-editar">Editar</a>
    <a href="eliminar_producto.php?id=<?php echo $row['codigo_producto']; ?>" class="btn btn-eliminar" onclick="return confirm('¿Seguro que quieres eliminar este producto?');">Eliminar</a>

    </td>
</tr>
<?php } ?>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['codigo_producto']; ?></td>
            <td><?php echo $row['nombre']; ?></td> 
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['proveedor']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            

        </tr>
            
        <?php } ?>
    </table>
</body>
</html>


