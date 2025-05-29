<?php
require_once __DIR__ . '/../../includes/db.php';

$nombre      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio      = $_POST['precio'];
$stock       = $_POST['stock'];
$imagen      = null;

// Procesar imagen si se cargó
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = basename($_FILES['imagen']['name']);
    $rutaDestino   = __DIR__ . '/../../img/' . $nombreArchivo;
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
        $imagen = $nombreArchivo;
    }
}

// Preparar SQL (ahora con 5 placeholders)
$sql = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Cambiado a "ssdis": string, string, double, integer, string
$stmt->bind_param("ssdis", $nombre, $descripcion, $precio, $stock, $imagen);
$stmt->execute();

// Redirigir al listado
header("Location: listar.php");
exit;
