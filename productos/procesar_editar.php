<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];

    // Validar que los datos no estén vacíos
    if (!empty($id) && !empty($nombre) && !empty($categoria) && !empty($proveedor) && !empty($precio) && !empty($stock) && !empty($descripcion)) {
        
        // Usar una consulta preparada para seguridad
        $query = "UPDATE producto SET nombre=?, categoria=?, proveedor=?, precio=?, stock=?, descripcion=? WHERE codigo_producto=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssdisi", $nombre, $categoria, $proveedor, $precio, $stock, $descripcion, $id);

        if ($stmt->execute())
        
        {
            header("Location: listar_productos.php"); // Redireccionar a la lista de productos
            exit();
        } else {
            echo "Error al actualizar el producto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}

$conn->close();
?>