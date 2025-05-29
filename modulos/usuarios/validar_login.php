<?php
require_once __DIR__ . '/../../includes/db.php';
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consultar el usuario por correo
$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si existe el usuario
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    
    // Verificar la contraseña
    if (password_verify($contrasena, $usuario['contrasena'])) {
        // Crear sesión para el usuario
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        
        // Redirigir a la página principal
        header("Location: /tienda_virtual/index.php");
        exit;
    } else {
        // Contraseña incorrecta
        echo "Correo o contraseña incorrectos.";
    }
} else {
    echo "Correo o contraseña incorrectos.";
}
