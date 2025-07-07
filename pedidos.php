<?php
session_start();
require 'admin/funciones.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// Conectar a la base de datos
$conexion = conectar();
$usuario_id = $_SESSION['id_usuario'];

// Obtener los pedidos del usuario
$queryPedidos = "
    SELECT p.id AS pedido_id, p.total, p.fecha, p.estado 
    FROM pedidos p 
    WHERE p.usuario_id = '$usuario_id'
    ORDER BY p.fecha DESC
";

$resultadoPedidos = mysqli_query($conexion, $queryPedidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="contenedorproductos3.css">
    <link rel="stylesheet" href="estiloindex.css">
    <link rel="stylesheet" href="sudmenunavbar.css">
    <link rel="stylesheet" href="footer.css">


    <style>

        body{
            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px minmax(504px,auto)  170px;

            row-gap: 20px;
        }

        .contenedorproductos{
            grid-row: 3/4;
            grid-column: 2/5;

            grid-auto-rows: 100px;

            height: minmax(500px, auto);


        }

        footer{                     
        grid-column: 1/8;
        grid-row: 4;
        }


        .contenedorpedidos {
            display: grid; /* O flex según tu diseño */
            grid-template-columns: repeat(3, 1fr); /* Mismo diseño que el contenedor de productos */
            gap: 20px; /* Espacio entre los pedidos */
            padding: 20px;
        }

        .pedido {
                display: flex; /* Utilizamos flexbox dentro de cada pedido */

                align-items: center;
                justify-content: space-between;
                flex-direction: row; /* Organiza los elementos del pedido en columna */
                background-color: rgba(240, 234, 210, 0.7); /* Fondo similar al contenedor de productos */
                border-radius: 5px; /* Bordes redondeados */
                padding: 10px; /* Espacio interno del pedido */
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
                text-align: left; /* Alineación a la izquierda */

                backdrop-filter: blur(15px);

                padding-left: 40px;
                padding-right: 50px;


                
            
            }





            .pedido h2 , .pedido h3{

                
                font-family: 'Segoe UI', sans-serif;


                    box-shadow: black;
                    color: rgb(55, 45, 39);
            }


            .pedido p{

                
                font-family: 'Segoe UI', sans-serif;

                box-shadow: black;
                  color: rgb(55, 45, 39);

            }

            .accion{

                background-color: rgb(0, 0, 0,0);
                border: none;
            }





            @media (max-width: 718px) { 



                .contenedorproductos{

                    grid-column: 1/6;
                    grid-template-columns: 1fr;
                    grid-auto-rows: auto;


                        padding: 5px;
                    }

             }



            @media (max-width: 524px) {

                .contenedorproductos{

                grid-column: 1/6;
                grid-template-columns: 1fr 1fr;
                grid-auto-rows: auto;
                gap: 0px;
                border-radius: 5px;

                
                    padding: 5px;
                }



                .pedido {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: space-between;

                padding-left: 20px;
                padding-right: 20px;

                border-radius: 5px;
                margin: 5px;

                }

            }

            @media (max-width: 550px) {

            .pedido {


                padding-left: 20px;
                padding-right: 20px;

            }            
            }


            



                
            @media (max-width: 550px) {

                .pedido {


                    padding-left: 20px;
                    padding-right: 20px;

                }            
            }

                
            @media (max-width: 359px) {

                .pedido {


                    padding-left: 2px;
                    padding-right: 2px;

                }     
                
                

                .pedido p{

                
                    font-size: 5px;
                }
            
            
            }




                </style>

    <title>Tus Pedidos</title>

    <header>
        <div id="logo-titulo">
        <img id="logo" src="icons/logo claro.png" alt=""> <h1>Tus Pedidos</h1>
        </div>
    </header> 



    <div id="barras">
            

            <form id="barrabusqueda" action="buscar.php" method="post">     
              
                    <input name="busqueda" class="inputbuscar" type="text">
                    <button type="submit" class="botonbuscar" ><img style="margin-top: 3px;" class="icon" src="icons/Search.png" alt=""></button>
            </form> 


        <nav> 
            <a href="index.php"><img  style="margin-top: 4px;" class="icon" src="icons/homecafe.png" alt=""></a>
            <div class="dropdown">
            <a href="#" onclick="toggleMenu()">Categorías</a>
                <div class="dropdown-content" id="dropdownMenu">
                    <a href="semillas.php">Semillas</a>
                    <a href="fertilizantes.php">Fertilizante</a>
                    <a href="insecticida.php">Insecticida</a>
                    <a href="medicina.php">Medicina</a>
                    <a href="alimento.php">Alimentos</a>
                    <a href="animales.php">Animales</a>
                </div>
            </div>
            <a href="pedidos.php">Pedidos</a>
            <a href="carrito.php"><img style="margin-top: 6px;" class="icon" src="icons/carrito.png" alt=""></a>
        </nav>
            
        <div id="barrapersonal" class="sudmenuoculto">
            <a href="#"><img class="icon" src="icons/Notify.png" alt="Notificaciones"></a>
            <a href="#" class="icon-link" onclick="toggleUserMenu()">
                <img class="icon" src="icons/User.png" alt="Usuario">
            </a>
            <div id="userMenu" class="user-menu">
                <a href="#">Hola <?php echo $_SESSION['usuario'] ?> </a>
                <a href="editarU.php">Configuración</a>
                <a href="cerrar.php">Cerrar sesión</a>
            </div>
        </div>


        
    </div>

    <script src="sudmenus.js"></script>
</head>
<body>
   

<div class="contenedorproductos"> <!-- Cambiado a contenedorpedidos -->
    <?php if (mysqli_num_rows($resultadoPedidos) > 0): ?>
        <?php while ($pedido = mysqli_fetch_assoc($resultadoPedidos)): ?>
            <div class="pedido">

                <h3>ID: <?php echo ' '.$pedido['pedido_id']; ?></h3>
                <p>Total: <?php echo '$' . number_format($pedido['total'], 2, '.', ','); ?></p>
                <p>Fecha: <?php echo date("d-m-Y H:i:s", strtotime($pedido['fecha'])); ?></p>
                <p>Estado: <?php echo htmlspecialchars($pedido['estado']); ?></p>

                <button class="accion" onclick="verDetalles(<?php echo $pedido['pedido_id']; ?>)" ><img class="icon" src="icons/info.svg" alt=""></button>

            </div>
        <?php endwhile; ?>
    <?php else: ?>

        <div class="pedido">
        <p>No has realizado ningún pedido aún.</p></div>
    <?php endif; ?>

    <?php 
    // Cerrar conexión
    mysqli_close($conexion); 
    ?>
</div>

    <script src="funciones.js"></script>

    <footer>
    <p>&copy; 2024 - Agro Shop</p>
    <div class="social-icons">
        <img style="margin-top: 6px;" class="icon" src="icons/Facebook.svg" alt="JSAIDJA"></a> <a href="#">Facebook</a>
        <img style="margin-top: 6px;" class="icon" src="icons/X.svg" alt="JSAIDJA"></a>  <a href="#">Twitter</a>
        <img style="margin-top: 6px;" class="icon" src="icons/Whatsaap.svg" alt="JSAIDJA"></a>  <a href="#">Whatsaap</a>
    </div>
    <p>Todos los derechos reservados</p>

     </footer>
        
     <script>
         function verDetalles(pedido_id) {
            if (confirm('Desea Ver Informacion Del Pedido La Compra')) {    // Crear un formulario
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'detalle_DP.php'; // Cambia esto al archivo de detalles del pedido

            // Crear un input oculto para enviar el pedido_id
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id'; // Nombre del campo que recibirás en detalle_DP.php
            input.value = pedido_id; // Usar el pedido_id

            // Agregar el input al formulario
            form.appendChild(input);

            // Agregar el formulario al body
            document.body.appendChild(form);

            // Enviar el formulario
            form.submit();

            }
        }



     </script>


<script src="admin/animaciones.js"></script>
</body>
</html>
