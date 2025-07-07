<?php 

    // Contar cuántas variables se han enviado por POST
$numeroDeVariables = count($_POST);

// Si se envían exactamente tres variables (id, columna, cambio)
if ($numeroDeVariables == 3) {
    $idp = $_POST['id'];
    $columna = $_POST['columna'];
    $cambio = $_POST['cambio'];

    require 'funciones.php';
    cambiar($idp, "producto", $columna, $cambio);
} else {
    // Aquí puedes manejar otros cambios en función de más variables de POST
    $idp = $_POST['id'];
    $columna1 = $_POST['columna1'];
    $cambio1 = $_POST['cambioColumna1'];
    $columna2 = $_POST['columna2'];
    $cambio2 = $_POST['cambioColumna2'];

    // Llamar a la función 'cambiar' para cada columna que necesites modificar
    require 'funciones.php';
    
    cambiar($idp, "producto", $columna1, $cambio1);
    cambiar($idp, "producto", $columna2, $cambio2);
}


?>