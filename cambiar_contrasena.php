<?php
session_start();
require 'admin/funciones.php';

$id = $_POST['id'];
$nuevaContrasena = $_POST['nueva_contrasena'];



// Asegúrate de usar una función segura para actualizar la contraseña
$response = [];

if (cambiar($id,'usuarios','contrasena',$nuevaContrasena)) {
    $response['status'] = 'success'; // Mensaje de éxito
} else {
    $response['status'] = 'error'; // Mensaje de error
}

echo json_encode($response);
?>
