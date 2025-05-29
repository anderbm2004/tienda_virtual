<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
include_once __DIR__ . '/../../includes/header.php';

$error = null; // Variable para almacenar mensajes de error

// Procesar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Validar que los campos no estén vacíos
    if (empty($correo) || empty($contrasena)) {
        $error = "Por favor, completa todos los campos.";
    } else {
        // Consultar la base de datos para verificar el usuario
        $sql = "SELECT id, nombre, contrasena, role FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Guardar datos en la sesión
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['role'] = $usuario['role'];
                header("Location: ../../index.php"); // Redirigir al inicio
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "Usuario no encontrado.";
        }
    }
}
?>

<?php if (isset($_GET['registro']) && $_GET['registro'] === 'exito'): ?>
    <div id="registro-exito" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 5px;">
        ✅ Usuario registrado con éxito. Ahora puedes iniciar sesión.
    </div>
    <script>
        // Ocultar el mensaje después de 5 segundos
        setTimeout(function() {
            const alerta = document.getElementById("registro-exito");
            if (alerta) {
                alerta.style.display = "none";
            }
        }, 5000);

        // Eliminar el parámetro 'registro' de la URL sin recargar la página
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.searchParams.delete('registro');
            window.history.replaceState(null, '', url);
        }
    </script>
<?php endif; ?>

<?php if (isset($_GET['error']) && $_GET['error'] === 'no_sesion'): ?>
    <p style="color: red;">Debes iniciar sesión para acceder a esta página.</p>
<?php endif; ?>

<h2>Iniciar sesión</h2>

<?php if ($error): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form action="" method="POST">
    <label>Correo:</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="contrasena" required><br><br>

    <button type="submit">Iniciar sesión</button>
</form>

<p><a href="registro.php">¿No tienes cuenta? Regístrate aquí</a></p>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
