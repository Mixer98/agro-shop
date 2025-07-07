<?php


require 'admin/funciones.php';


$id = $_POST['id_producto'];

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
            background-image: url(images/fondito8.jpg);
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

        .img {
            width: 290px; /* Ancho fijo */
            height: 300px; /* Alto fijo */
            max-width: 290px; /* Ancho máximo */
            max-height: 300px; /* Alto máximo */
            object-fit: cover; /* Recorta la imagen para llenar el área especificada */
            border-radius: 10px; /* Bordes redondeados */
            margin-right: 20px; /* Margen derecho */
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

        .price-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
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
        }

        #descuento{
            background-color: rgb(0,0,0,0);
            border: none;

        }


        @media (max-width:774px){


            body {

                padding: 0px;

            }


            .container {
            background-color: rgba(108, 88, 76,0.9);
            max-width: 800px;
            margin: auto;
            padding: 10px;

            backdrop-filter: blur(0px);

            border-radius: 0px;
            }
        }

        @media (max-width:710px){

          

            .price-section {
                flex-direction: column; /* Cambia la dirección a columna */
                align-items: center;
                justify-content: space-between;

                
            }


        }

        @media (max-width:568px){

          
            h2,h3{

                font-size: 17px;
            }


}


        @media (max-width:568px){

                    .top-section {
                        flex-direction: column; /* Cambia la dirección a columna */
                        align-items: center;
                        justify-content: space-between;
                    
                    }
        }









    </style>
</head>

<body>
    <div class="container">

    <div class="top-right">
        <!-- Enlace con icono -->
        <a href="javascript:window.history.back();">
            <img class="icono2" src="icons/volverclaro.png" alt="">
        </a>

    </div>

        <div class="top-section">

            <img class="img" src="admin/<?php echo consultar($id,"producto","imagen"); ?>" alt="Imagen del producto: Malation">
            <div class="details">
                <h3><span class="label">Nombre:</span> <?php echo consultar($id,"producto","nombre"); ?></h3>
                <h3><span class="label">Marca:</span> <?php echo consultar($id,"producto","marca"); ?></h3>
                <h3><span class="label">Categoria:</span> <?php echo consultar($id,"producto","categoria"),' ', consultar($id,"producto","subtipo");?></h3>
                <h3><span class="label">Medida:</span> <?php echo consultar($id,"producto","medida"), ' ',consultar($id,"producto","unidad_medida"); ?></h3>
                
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
                        
            
                        
                        <img class="icono2" src="icons/descuento2claro.svg">
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


                    
                    <button class="btn" onclick="gcarrito('<?php echo $id ;?>')">Agregar al carrito</button>
                </div>
            </div>
        </div>

        <div class="description">
            <p><?php echo consultar($id,"producto","Descripcion"); ?></p>
        </div>
    </div>


    <script src="funciones.js"></script>

    <script src="admin/animaciones.js"></script>
</body>

</html>
