<?php
// filepath: c:\xampp\htdocs\tienda_virtual\includes\verificar_sesion.php
require_once __DIR__ . '/../usuarios/session.php'; // Verificar sesión

if ($_SESSION['role'] !== 'admin') {
    die("Error: No tienes permiso para realizar esta acción.");
}

// Código para editar precios
require_once __DIR__ . '/../../includes/db.php';

$id_producto = $_POST['id_producto'];
$nuevo_precio = $_POST['nuevo_precio'];

$sql = "UPDATE productos SET precio = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $nuevo_precio, $id_producto);
$stmt->execute();

header("Location: productos.php?mensaje=precio_actualizado");
exit;
?>