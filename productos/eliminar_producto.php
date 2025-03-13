<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM producto WHERE codigo_producto = $id";
    if ($conn->query($query) === TRUE) {
        echo "Producto eliminado correctamente.";
        header("Location: listar_productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}

$conn->close();
?>
