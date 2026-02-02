<?php
// conexion.php
$host = "localhost";
$usuario = "usuario_bd";
$contrasena = "password_bd";
$base_datos = "proyecto_daw";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>