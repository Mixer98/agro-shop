<?php 

require "funciones.php";

$idP=$_POST['id'];

eliminar($idP,"producto");


echo "<script>
                alert('Producto eliminado con éxito.');
                window.location.href = 'inventario.php';
              </script>";

?>