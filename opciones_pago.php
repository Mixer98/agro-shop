
<?php 

    session_start();

    require 'admin/funciones.php';

    verificarSesion();
    verificarsecionEstandar();



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de Pago</title>
    <link rel="stylesheet" href="estilos.css">  <!-- Aquí pones tu CSS -->

    <style>
        body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-image: url('images/fondito.jpg');
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
        .container {
            width: 60%; /* Reduce el ancho general */
            margin: 0 auto;
            padding: 20px;
            text-align: center; /* Alinea el contenido al centro */
            background-color: rgba(108, 88, 76,0.8);

            backdrop-filter: blur(15px);
            background-attachment: fixed;
            color:rgb(240,234,210);
            font-family: 'Segoe UI', sans-serif;

            border-radius: 5px;
        }

        .payment-methods {
            display: flex;
            justify-content: center; /* Centra los elementos */
            gap: 20px; /* Espacio entre los elementos */
            flex-wrap: nowrap;
        }

        .payment-method {
            width: 22%; /* Reduce el tamaño de cada opción de pago */
            padding: 15px; /* Menor padding */
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;

            border: 2px solid rgb(240,234,210);
        }
        .payment-method img {
            width: 80px; /* Ajusta el tamaño de las imágenes */
            margin-bottom: 8px;
        }
        .payment-method h3 {
            font-size: 16px; /* Tamaño de fuente más pequeño */
            margin: 8px 0;

            font-family: 'Segoe UI', sans-serif;
            color:rgb(240,234,210);
        }

        .buy-button {

            margin-top: 20px;

            font-family: 'Segoe UI', sans-serif;
            display: block;
            width: 100%;
            padding: 10px;


            background-color: rgb(240,234,210);
            color: rgb(55, 45, 39);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
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

        .icono2{
            width: 30px;
        }

        input{
            width: 100px;
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

    <h2>Opciones de Pago</h2>

    <p>Total a pagar: <strong>$<?php echo number_format($_POST['total'], 2, '.', ','); ?></strong></p>
    <p>Usuario: <?php echo consultar($_POST['usuario_id'],'usuarios','usuario' );?></p>


    <form action="procesar_compra.php" method="post">
        <!-- Campo oculto para el total y el usuario -->
        <input type="hidden" name="total" value="<?php echo $_POST['total']; ?>">

        <div class="payment-methods">
            <!-- Opción de pago con tarjeta -->
            <div class="payment-method">
                <img src="iconos/tarjeta1.svg" alt="Tarjeta de Crédito">
                <h3>Tarjeta de Crédito/Débito</h3>
                <input type="radio" name="metodo_pago" value="tarjeta" required>
            </div>

            <!-- Opción de pago con PayPal -->
            <div class="payment-method">
                <img src="iconos/Paypal.svg" alt="PayPal">
                <h3>PayPal</h3>
                <input type="radio" name="metodo_pago" value="paypal"> 
            </div>

            <!-- Opción de pago con Nequi -->
            <div class="payment-method">
                <img src="iconos/Nequi.svg" alt="Nequi">
                <h3>Nequi</h3>
                <input type="radio" name="metodo_pago" value="nequi">
            </div>

            <!-- Opción de pago en efectivo -->
            <div class="payment-method">
                <img src="iconos/efectivo.svg" alt="Efectivo">
                <h3>Efectivo</h3>
                <input type="radio" name="metodo_pago" value="efectivo">
            </div>
        </div>

        <button type="submit" class="buy-button">Confirmar Pago</button>
    </form>
</div>

</body>
</html>
