<?php


require 'funciones.php';


$id = $_POST['id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

                body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                background-image: url('../images/fondito2.jpg');
                }



    

        .product-container {
        display: flex;
        align-items: flex-start;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0);

        padding: 20px;
        background-color: rgba(108, 88, 76, 0.6);
        font-family: 'Segoe UI', sans-serif;
        font-size: 20px;
        font-weight: normal;
        color: rgb(240,234,210);

        text-shadow: 0px 0px 15px rgba(0, 0, 0);
        margin: 0 auto;
        }

        .product-image-container {
        flex: 1;
        padding-right: 20px;
        }

        .product-image {
        width: 100%;

        border-radius: 5px;
        }

        .product-details {
        flex: 2;
        }

        .product-name {
     
        margin-top: 0;
        margin-bottom: 10px;
        }

        .product-details label {
        display: block;

        margin: 4px 0;
        }

        .product-price {


        margin-top: 10px;
        }

        .product-description {

        margin-top: 10px;
        }

    </style>



</head>
<body>

<div class="product-container">
        
        <div class="product-image-container">
            <a href="inventario.php">Volver</a> <form action="subir_imagen.php" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit">Cambiar Imagen</button><br>
        </form>
            <img src="<?php echo consultar($id,"producto","imagen",) ?>"  alt="Imagen del producto" class="product-image">    
        </div>
        <div class="product-details">  
            <H1 class="product-name">Nombre: <?php echo consultar($id,"producto","nombre"); ?></H1>
            <Label class="product-brand">Marca: <?php echo consultar($id,"producto","marca"); ?></Label>
            <Label class="product-category">Categoría:<?php echo consultar($id,"producto","categoria"); ?></Label>
            <Label class="product-subcategory">SubCategoria: <?php echo consultar($id,"producto","subtipo"); ?></Label>
            <Label class="product-measure">Medida: <?php echo consultar($id,"producto","medida"); ?></Label>
            <Label><?php echo consultar($id,"producto","unidad_medida"), consultar($id,"producto","unidad_medida"); ?></Label>
            <Label class="product-units">Unidades Disponibles:<?php echo consultar($id,"producto","unidades_disponibles"); ?></Label>
            <Label class="product-price">Preccion: $</Label>
            <Label class="product-storage-type">Tipo De Almacenamiento: <?php echo consultar($id,"producto","tipo_almacenamiento"); ?></Label>
            <label class="product-storage-location"></label>
            <p class="product-description">Descripción: <?php echo consultar($id,"producto","Descripcion"); ?></p> 
        </div>


        
</div>





</body>
</html>