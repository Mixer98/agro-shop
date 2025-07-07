<?php 

    $direcionN= $_POST['direccion'];



    session_start();
    $id = $_SESSION['id_usuario'];
    

    

    require_once 'admin/funciones.php';

    cambiar($id,'usuarios', 'direccion',$direcionN);

    header('Location: editarU.php');

?>