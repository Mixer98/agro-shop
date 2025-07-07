<?php
session_start();
require 'admin/funciones.php';

$id = $_POST['id'];
$contrasenaAnterior = $_POST['contrasena'];

// Obtén la contraseña actual del usuario desde la base de datos
$contraseñaGuardada = consultar($id, 'usuarios', 'contrasena');

// Verifica si la contraseña ingresada coincide con la almacenada
$response = [];
if ($contrasenaAnterior === $contraseñaGuardada) {
    $response['status'] = 'success'; // Contraseña correcta
} else {
    $response['status'] = 'error'; // Contraseña incorrecta
}

echo json_encode($response);
?>
