<?php
require 'funciones.php';


session_start();


verificarsecionAdministrativa();



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
            color: rgb(240,234,210);
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
            color: rgb(240,234,210);
            font-size: 24px;
        }

        .description ,.promotion-section label {
            font-family: 'Segoe UI', sans-serif;
            font-size: 20px;
            font-weight: normal;
            color: rgb(240,234,210);
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

        .btn ,.promotion-btn  {
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
            white-space: nowrap;
        }

        #cantidad {
            font-size: 18px;
            text-align: center;
            width: 80px;
        }

        .top-right {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .top-right a,
        .top-right button {
            font-size: 12px;
            padding: 5px;
            background-color: transparent;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .icono2 {
            width: 30px;
        }

        /* Nuevo estilo para el textarea y el botón de promocionar */
        .promotion-section {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
        }

        textarea {
            width: 95%;
            height: 150px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: rgb(240,234,210);
            color: rgb(55, 45, 39);
            font-family: 'Segoe UI', sans-serif;
            margin-bottom: 20px;
            resize: none; /* Evita el cambio de tamaño por parte del usuario */
        }

        #descuento {
            width: 95%; /* Ancho del select */
            padding: 10px; /* Espaciado interno */
            font-size: 16px; /* Tamaño de fuente */
            border-radius: 5px; /* Bordes redondeados */
            border: none; /* Sin borde */
            background-color: rgb(240, 234, 210); /* Color de fondo */
            color: rgb(55, 45, 39); /* Color del texto */
            margin-bottom: 20px; /* Margen inferior */
            cursor: pointer; /* Cambia el cursor al pasar sobre el select */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
        }

        /* Estilo para el hover */
        #descuento:hover {
            background-color: rgb(220, 220, 220); /* Cambio de color al pasar el ratón */
        }

        /* Estilo para el enfoque */
        #descuento:focus {
            outline: none; /* Eliminar el contorno por defecto */
            box-shadow: 0 0 5px rgba(0, 0, 255, 0.5); /* Efecto de sombra al enfocar */
        }

 
    </style>
</head>

<body>
    <div class="container">

        <div class="top-right">
            <a href="inventario.php"><img class="icono2" src="../icons/volverclaro.png" alt="Volver"></a>
            
        </div>

        <div class="top-section">
            <img src="./<?php echo consultar($id, "producto", "imagen"); ?>" alt="Imagen del producto">
            <div class="details">
                <h3><span class="label">Nombre:</span> <?php echo consultar($id, "producto", "nombre"); ?></h3>
                <h3><span class="label">Marca:</span> <?php echo consultar($id, "producto", "marca"); ?></h3>
                <h3><span class="label">Categoria:</span> <?php echo consultar($id, "producto", "categoria") . ' ' . consultar($id, "producto", "subtipo"); ?></h3>
                <h3><span class="label">Medida:</span> <?php echo consultar($id, "producto", "medida"); ?> litro</h3>
                <h3><span class="label">Almacenado En:</span> <?php echo consultar($id, "producto", "lugar_almacenamiento"); ?></h3>
                <div class="price-section">
                    <h2 class="price">Precio: $<?php echo consultar($id, "producto", "precio"); ?></h2>

                </div>
            </div>
        </div>

        <div class="description">
            <p><?php echo consultar($id, "producto", "Descripcion"); ?></p>
        </div>

        <div class="promotion-section">

        <label for="descuento" style="margin-bottom: 5px;">Selecciona el porcentaje de descuento:</label><br>

            <form action="promocionar_logica.php" method="post"> 

                <select id="descuento" name="descuento" required>

                    <option value="0" selected>Sin descuento</option>
                    <option value="5">5%</option>
                    <option value="10">10%</option>
                    <option value="15">15%</option>
                    <option value="20">20%</option>
                    <option value="25">25%</option>
                    <option value="30">30%</option>
                    <option value="50">50%</option>
                </select><br><br>
                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="mensaje" style="margin-bottom: 5px;">Mensaje para la promoción:</label><br><br>
                <textarea id="mensaje" name="mensaje" placeholder="Escriba aquí su mensaje de promoción..."></textarea>
                <button type="submit" class="promotion-btn">Promocionar</button>
            </form>
        </div>

    </div>
</body>

</html>
