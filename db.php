<?php
$host = "localhost"; 
$user = "root";
$pass = "1039884096"; 
$dbname = "tienda_virtual"; 


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>
