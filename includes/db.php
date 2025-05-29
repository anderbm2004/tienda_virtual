<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = "1039884096"; //contraseña de MySQL
$base_datos = "tienda_virtual"; // Cambia si tu BD tiene otro nombre

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
