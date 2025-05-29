<?php
require_once __DIR__ . '/../../includes/db.php';

// Validar que los datos existan
if (!isset($_POST['nombre'], $_POST['correo'], $_POST['contrasena'], $_POST['role'])) {
    die("Error: Todos los campos son obligatorios.");
}

$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$contrasena = $_POST['contrasena'];
$role = $_POST['role'];

if (empty($nombre) || empty($correo) || empty($contrasena) || empty($role)) {
    die("Error: Todos los campos son obligatorios.");
}

// Hashear la contraseña para mayor seguridad
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Preparar SQL para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, correo, contrasena, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $correo, $contrasena_hash, $role);
$stmt->execute();

// Redirigir con parámetro de éxito
header("Location: login.php?registro=exito");
exit;
