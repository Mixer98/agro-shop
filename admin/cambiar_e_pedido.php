<?php
    require 'funciones.php';



    $id = $_POST['pedido_id'];

    $cambio = $_POST['nuevo_estado'];

    cambiar($id,'pedidos','estado',$cambio);


    RedirigirConPost($id,'detalle_DP.php');



?>