<?php
require 'conexion.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$categoria = $_POST['categoria'];
$fecha = $_POST['fecha'];
$fechav = $_POST['fechav'];



$insertar = "INSERT INTO productos (nombre, precio, cantidad, unidad, categoria, fecha, fechav) VALUES ('$nombre', '$precio', '$cantidad', '$unidad', '$categoria', '$fecha', '$fechav')";

$query = mysqli_query($conectar, $insertar);

if($query) {
    echo "<script> alert ('Se ha registrado bien fino');
    location.href = './producto.html';
    </script>";

}else {
    echo" <script language= 'javascript'>
    alert ('ERROR: No se resgistro vale mia');
    location.assign ('proyecto.html');
    </script>";

}
