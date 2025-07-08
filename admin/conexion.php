<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "agroshop";

$conexion = mysqli_connect($host, $usuario, $clave, $bd);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

?>