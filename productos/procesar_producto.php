<?php
include '../db.php'; // Conecta con la BD (ajusta la ruta si es necesario)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];

    // Verifica que los campos no estén vacíos
    if (!empty($nombre) && !empty($precio) && !empty($stock)) {
        $sql = "INSERT INTO producto (nombre, categoria, proveedor, precio, stock, descripcion) 
                VALUES ('$nombre', '$categoria', '$proveedor', '$precio', '$stock', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
}

$conn->close();
?>
