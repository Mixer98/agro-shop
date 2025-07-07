<?php
require_once "admin/funciones.php";


if (!conectar()) {
    die("No se establece la conexión: " . mysqli_connect_error());
}

$usuario = $_POST['usuario'];
$password = $_POST['contrasena'];


$consulta = mysqli_query(conectar(), "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$password'");
$numero_de_filas = mysqli_num_rows($consulta);

if ($numero_de_filas == 1) {

    $usuario_datos = mysqli_fetch_assoc($consulta);
    $id_usuario = $usuario_datos['id'];
    $rol = $usuario_datos['rol'];



    iniciarSesion($usuario, $rol, $id_usuario);



} else if ($numero_de_filas == 0) {
    echo "<script language='javaScript'>
    alert('FATAL ERROR: los datos ingresados son incorrectos :(');
    location.assign('login.php');
    </script>";
}
