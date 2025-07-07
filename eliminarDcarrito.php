<?php
session_start();
require 'admin/funciones.php';

$elemento_id = $_POST['elemento_id'];
$usuario_id = $_SESSION['id_usuario'];

$conexion = conectar();

// Elimina el producto específico del carrito del usuario
$queryEliminar = "DELETE FROM carrito WHERE id = '$elemento_id' AND usuario_id = '$usuario_id'";
$resultado = mysqli_query($conexion, $queryEliminar);

if ($resultado) {
    echo "<script>alert('Producto elliminado del carrito con éxito.'); location.href = 'carrito.php';</script>";
} else {
    echo "<script>alert('Error'); location.href = 'carrito.php';</script>";
}

mysqli_close($conexion);
?>
