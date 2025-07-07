<?php

require 'admin/funciones.php'; // Asegúrate de que este archivo contiene la función conectar() y cambiar()

// Obtener los datos enviados por el método POST
$id = $_POST['id'];
$columna = $_POST['columna'];
$nuevo_valor = $_POST['nuevo_valor'];

// Usar la función cambiar para actualizar el valor en la base de datos
if (cambiar($id, 'usuarios', $columna, $nuevo_valor)) {
    echo "El valor de $columna ha sido actualizado correctamente.";
} else {
    echo "Hubo un error al actualizar el valor de $columna.";
}
?>