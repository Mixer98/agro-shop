<?php
require 'admin/funciones.php';

// Conectar una sola vez y usar la misma conexión
$conexion = conectar();

// Obtener valores del formulario
$usuario = $_POST['usuario'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];
$contrasena = $_POST['contrasena'];
$rol = 'usuario';

// Insertar el usuario en la tabla `usuarios`
$insertarUsuario = "INSERT INTO usuarios (usuario, documento, correo, sexo, edad, contrasena, rol) 
                    VALUES ('$usuario', '$documento', '$correo', '$sexo', '$edad', '$contrasena', '$rol')";
$queryUsuario = mysqli_query($conexion, $insertarUsuario);

if ($queryUsuario) {

    $usuario_id = mysqli_insert_id($conexion);

    if ($usuario_id > 0) {
        $insertarCarrito = "INSERT INTO carrito (usuario_id) VALUES ('$usuario_id')";
        $queryCarrito = mysqli_query($conexion, $insertarCarrito);

        if ($queryCarrito) {
            echo "<script> alert('Usuario Registrado'); location.href = './login.php'; </script>";
        } else {
            echo "<script> alert('ERROR: No se pudo crear el carrito'); location.assign('login.php'); </script>";
        }
    } else {
        echo "<script> alert('ERROR: El ID del usuario no es válido'); location.assign('login.php'); </script>";
    }
} else {
    echo "<script> alert('ERROR: No se registró el usuario'); location.assign('login.php'); </script>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
