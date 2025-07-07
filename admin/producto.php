<?php


require 'funciones.php';


$id = $_POST['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto: Malation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url(../images/fondito10.jpg);
            background-size: cover;
        }

        .container {
            background-color: rgba(108, 88, 76,0.8);
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            backdrop-filter: blur(15px);
        }

        .top-section {
            display: flex;
            align-items: flex-start;
        }

        img {
            width: 290px;
            height: auto;
            border-radius: 10px;
            margin-right: 20px;
        }

        .details {
            flex: 1;
        }

        h2, h3 {
            font-family: 'Segoe UI', sans-serif;
            font-size: 20px;
            font-weight: normal;
            color:rgb(240,234,210);
            align-items: center;
            text-shadow: 0px 0px 15px rgba(0, 0, 0);
        }



        .price {
            font-family: 'Segoe UI', sans-serif;
            color:rgb(240,234,210);
            font-size: 24px;
        }

        .description {
            font-family: 'Segoe UI', sans-serif;
            font-size: 20px;
            font-weight: normal;
            color:rgb(240,234,210);
        }

        .label {
            font-weight: bold;
        }

        .quantity-input {
            margin-right: 10px;
            padding: 5px;
            width: 60px;
            font-size: 16px;
        }

        .btn {
            text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
            margin-right: 8px;
            border-radius: 5px;
            border: none;
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px;
            font-weight: normal;
            height: 35px;
            width: auto;
            backdrop-filter: blur(12px);
            background-color: rgb(240,234,210);
            color: rgb(55, 45, 39);
            margin-right: 20px;
            white-space: nowrap;

        }

        #cantidad {
            text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
            margin-right: 8px;
            border-radius: 5px;
            border: none;
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px;
            font-weight: normal;
            height: 20px;
            width: 80px;
            backdrop-filter: blur(12px);
            background-color: rgb(240,234,210);
            color: rgb(55, 45, 39);
            margin-right: 20px;
            white-space: nowrap;
            text-align: center;
        }

        #cantidad:hover {
            text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
            margin-right: 8px;
            border-radius: 5px;
            border: none;
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px;
            font-weight: normal;
            height: 20px;
            width: 80px;
            backdrop-filter: blur(12px);
            background-color: rgb(240,234,210);
            color: rgb(55, 45, 39);
            margin-right: 20px;
            white-space: nowrap;
        }



        .top-right {
            display: flex;
            justify-content: flex-start; /* Alinea al final horizontalmente */
            gap: 10px; /* Espacio entre el enlace y el botón */
        }
        /* Estilo para los botones y el enlace */
        .top-right a,
        .top-right button {
            font-size: 12px;
            padding: 5px;
            background-color: rgb(0, 0, 0,0);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            text-decoration: none;
        }



        /* Estilo para el ícono dentro del botón y enlace */
        .top-right i {
            margin-right: 5px; /* Espacio entre el icono y el texto */
        }

        /* Opcional: Reducir el tamaño del ícono */
        .top-right i.fa {
            font-size: 10px;
        }


        .icono2{
            width: 30px;
            margin :0;
        }

        #descuento{
            background-color: rgb(0,0,0,0);
            border: none;
            margin  :0;

        }


    </style>
</head>

<body>
    <div class="container">

    <div class="top-right">
        <!-- Enlace con icono -->
        <a href="inventario.php"><img class="icono2" src="../icons/volverclaro.png" alt=""></a>

        <!-- Formulario con botón que tiene un icono -->
        <form action="subir_imagen.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit"><img class="icono2" src="../icons/subir.svg" alt=""></button>
        </form>
    </div>

        <div class="top-section">

            <?php
                $ruta=consultar($id,"producto","imagen");


                if(empty($ruta)){           
            ?>

                    <img  src="../icons/simagen2.svg" alt="Imagen del producto: Malation">



            <?php 
            }else{          
            ?>
                
            <img src="./<?php echo consultar($id,"producto","imagen"); ?>" alt="Imagen del producto: Malation">

            <?php 
            }
                
            ?>

            <div class="details">
                <h3><span class="label">Nombre:</span> <?php echo consultar($id,"producto","nombre"); ?></h3>
                <h3><span class="label">Marca:</span> <?php echo consultar($id,"producto","marca"); ?></h3>
                <h3><span class="label">Categoria:</span> <?php echo consultar($id,"producto","categoria"),' ', consultar($id,"producto","subtipo");?></h3>
                <h3><span class="label">Medida:</span> <?php echo consultar($id,"producto","medida"); ?> litro</h3>
                
                <h3><span class="label">Almacenado En:</span> <?php echo consultar($id,"producto","lugar_almacenamiento"); ?></h3>
                <div class="price-section">


                    <?php
                    
                    if (consultar($id,'producto','descuento')>0) {
                    
                        ?>
                        <h2 class="price">Precio: 
                        <button  id="descuento" onclick="descuento(
                        '<?php echo consultar($id,'producto','precio'); ?>', 
                        '<?php echo consultar($id,'producto','descuento'); ?>', 
                        '<?php echo consultar($id,'producto','precio_con_descuento') ;?>')">
                        
            
                        
                        <img class="icono2" src="../icons/descuento2claro.svg">
                        </button>$

                        
                    


                    <?php
                             echo  number_format(
                            
                                consultar($id,'producto','precio_con_descuento'), 2, '.', ',');

                                ?>
                                 </h2>
                                
                                <?php

                    }else {

                    ?>


                    <h2 class="price">Precio: $
                        <?php echo number_format(
                            
                            consultar($id,'producto','precio'), 2, '.', ',');?>
                            
                        
                        
                    </h2>


                    <?php 
                    }
                    
                    ?>


                    
    
                </div>
            </div>
        </div>

        <div class="description">
            <p><?php echo consultar($id,"producto","Descripcion"); ?></p>
        </div>
    </div>
</body>

<script>


function descuento(precioOriginal, porcentajeDescuento, precioConDescuento) {
    // Convertir las variables a números si están en formato de texto
    precioOriginal = parseFloat(precioOriginal);
    porcentajeDescuento = parseFloat(porcentajeDescuento);
    precioConDescuento = parseFloat(precioConDescuento);

    // Formatear los precios a pesos colombianos
    let precioOriginalCol = precioOriginal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
    let precioConDescuentoCol = precioConDescuento.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });

    // Mostrar el mensaje con las variables formateadas
    alert("Precio original: " + precioOriginalCol +
        "\nPorcentaje de descuento: " + porcentajeDescuento + "%" +
        "\nPrecio con descuento: " + precioConDescuentoCol);
}

</script>

<script src="animaciones.js"></script>

</html>
