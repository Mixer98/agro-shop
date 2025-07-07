<?php 

require "funciones.php";

$id=$_POST['id'];

eliminarUsuario($id,"usuarios");


echo "<script>
                alert('El Usuario se ha borrado');
                window.location.href = 'usuarios.php';
              </script>";

?>