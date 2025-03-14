<?php
//informacion para conexion de la base de datos
$host = "localhost"; //servidor
$user = "root"; //usuario
$pass = "1039884096"; //contraseña
$dbname = "tienda_virtual"; //nombre de la bd


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>
