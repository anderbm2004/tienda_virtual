<?php
include_once __DIR__ . '/../../includes/header.php';
?>

<h2>Registrar Usuario</h2>

<form action="guardar_usuario.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="user">Usuario</option>
    </select>
    <button type="submit">Registrar</button>
</form>

<p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
