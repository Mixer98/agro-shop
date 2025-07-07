<?php 
require 'funciones.php';

$id = $_POST['id'];


    $directorio = "imagenesproductos/";
    $imagen_anterior = consultar($id, "producto","imagen");

    if (file_exists($imagen_anterior)) {
        // Intenta eliminar el archivo
        if (unlink($imagen_anterior)) {
            echo "<script>
                alert('La Imagen Anterior ha sido borrada');
                </script>";

        } else {
            echo "<script>
                alert('error al borrar la anterior');
                </script>";
        }
    }


    // Verificar si el directorio existe; si no, crearlo
    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    // Obtener la información del archivo
    $archivo = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    // Establecer el nombre de la imagen a guardar (puede ser el nombre original o uno nuevo)
    $nombreArchivo = uniqid() . "." . $tipoArchivo;
    $rutaDestino = $directorio . $nombreArchivo;

    // Validar el tipo de archivo
    $tiposPermitidos = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($tipoArchivo, $tiposPermitidos)) {


        echo "<script language='javaScript'>
        alert('Solo se permiten archivos JPG, JPEG, PNG y GIF.');</script>";

        RedirigirConPost($id, "producto.php");


    }

    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        

        $rutaImagen = $rutaDestino;

        cambiar($id, "producto","imagen",$rutaImagen);

        echo "<script language='javaScript'>
        alert('La imagen ha sido cambiada Exitosamente');
         </script>";

         RedirigirConPost($id, "producto.php");


    } else {
        echo "Hubo un error al subir la imagen.";
    }
?>




