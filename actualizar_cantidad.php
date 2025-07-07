<?php
session_start();
require 'admin/funciones.php';

$conexion = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carrito_id = $_POST['carrito_id'];
    $nueva_cantidad = $_POST['nueva_cantidad'];

    // Actualizar la cantidad en la base de datos
    $updateQuery = "UPDATE carrito SET cantidad = '$nueva_cantidad' WHERE id = '$carrito_id'";
    $resultado = mysqli_query($conexion, $updateQuery);

    if ($resultado) {
        echo "Cantidad actualizada.";
    } else {
        echo "Error al actualizar la cantidad.";
    }
}

mysqli_close($conexion);
?>
