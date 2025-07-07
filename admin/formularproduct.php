
<?php
    require "funciones.php";

    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $subtipo = $_POST['subtipo'];
    $descripcion = $_POST['descripcion'];
    $medida = $_POST['medida'];
    $unidad_medida = $_POST['unidad_medida'];
    $unidades_disponibles = $_POST['unidades_disponibles'];
    $precio = $_POST['precio'];
    $tipo_almacenamiento = $_POST['tipo_almacenamiento'];
    $lugar_almacenamiento = $_POST['lugar_almacenamiento'];



                    
        // Comprobar conexión
        if (conectar()->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
                    

        $insertar = "INSERT INTO Producto( nombre, marca,   categoria,  subtipo,  medida, unidad_medida,  unidades_disponibles,  precio,  tipo_almacenamiento,  lugar_almacenamiento,  descripcion)
                                 VALUES  ('$nombre', '$marca', '$categoria', '$subtipo', '$medida','$unidad_medida', '$unidades_disponibles', '$precio', '$tipo_almacenamiento', '$lugar_almacenamiento', '$descripcion')";


        $query = mysqli_query(conectar(), $insertar);


        echo" <script language= 'javascript'>
            alert ('Registrado');
            location.assign ('formularproducto.php');
            </script>";


        if($query) {
           
        }else {
            echo" <script language= 'javascript'>
            alert ('ERROR: No se resgistro vale mia');
            location.assign ('formularproducto.php');
            </script>";


        }
?>