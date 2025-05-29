<?php
session_start();
session_destroy();
header("Location: /tienda_virtual/modulos/usuarios/login.php");
exit;
?>
