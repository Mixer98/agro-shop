<?php 

require "funciones.php";


$idPromo = $_POST['id']; 

if (empty($idPromo)) {
  die("Error: ID de promoción no proporcionado.");
}



$id_producto = consultar($idPromo,'promocion','id_producto');


cambiarNumero($id_producto,'producto','descuento',0);
cambiarNumero($id_producto,'producto','precio_con_descuento',0.00);



eliminar($idPromo,"promocion");

            echo "<script>
                alert('La Promocion Se Ha Eliminado con exito');
                window.location.href = 'adminindex.php';
              </script>";

?>