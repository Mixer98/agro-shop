<?php 
    require 'admin/funciones.php';
    session_start();


    verificarSesion();

    verificarsecionEstandar();

    



    
    // Verificar si el usuario está autenticado
    $usuario_id = $_SESSION['id_usuario'];


    direccion();


    
    $conexion = conectar();
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloindex.css">
    <link rel="stylesheet" href="sudmenunavbar.css">
    <link rel="stylesheet" href="carrusel.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="footer.css">

    <title>Carrito</title>


    <style>

        body{
            display: grid;
            grid-template-columns: repeat(5,1fr);

            grid-template-rows: 1fr 38px minmax(518px,auto)  170px;
            row-gap: 20px;
    
        }

        .container{
            grid-column: 1/6;
            grid-row: 3;


            max-height: 500px; 
        }

        footer{                     
        grid-column: 1/8;
        grid-row: 4;
        }


        #descuento{

            width: 20px;
            position: relative;
            height: auto;
            left: 14px;
            top: 5px;
        }


        .decuento-boton{
            background-color: rgb(0,0, 0,0);

            border: none;
        }

        .product{

            margin: 6px
        }
        

    </style>

    <header>
        <div id="logo-titulo">
            <img id="logo" src="icons/carritoClaro.svg" alt=""><h1>Carrito</h1>
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
<div class="container">
    <?php
    
                // Consulta para obtener los productos en el carrito del usuario
                $queryCarrito = "
                SELECT carrito.id AS id, producto.id AS producto_id, producto.nombre, 
                    carrito.cantidad, carrito.precio_total 
                FROM carrito
                INNER JOIN producto ON carrito.producto_id = producto.id
                WHERE carrito.usuario_id = '$usuario_id'
            ";

            $resultado = mysqli_query($conexion, $queryCarrito);


    
    
    
    
    if (mysqli_num_rows($resultado) > 0): ?>
        
        <?php 

        




        $totalGeneral = 0;
        while ($fila = mysqli_fetch_assoc($resultado)): 
            $carrito_id = $fila['id'];
            $idpara_imagen = consultar($carrito_id, 'carrito', 'producto_id');
            $imagen = consultar($idpara_imagen, 'producto', 'imagen');
        ?>
        
        <div class="product">
            <img src="admin/<?php echo $imagen; ?>" alt="<?php echo $fila['nombre']; ?>">
            
            <div class="product-info">
                <h3><?php echo htmlspecialchars($fila['nombre']); ?></h3>
                <p>
                    <?php
                    $comprobardescuento = consultar($idpara_imagen, 'producto', 'descuento');
                    if ($comprobardescuento > 0) {
                        ?>
                        <button class="decuento-boton"  onclick="descuento(
                            '<?php echo consultar($idpara_imagen, 'producto', 'precio'); ?>', 
                            '<?php echo consultar($idpara_imagen, 'producto', 'descuento'); ?>', 
                            '<?php echo consultar($idpara_imagen, 'producto', 'precio_con_descuento'); ?>')">
                            <img id="descuento" src="icons/descuento.svg">
                        </button>
                        <?php
                        $precion_unitario = consultar($idpara_imagen, 'producto', 'precio_con_descuento');
                        echo '$', number_format($precion_unitario, 2, '.', ',');
                    } else {
                        $precion_unitario = consultar($idpara_imagen, 'producto', 'precio');
                        echo '$', number_format($precion_unitario, 2, '.', ',');
                    }
                    ?>
                </p>
                <p>Cantidad: <?php echo $fila['cantidad']; ?></p>
            </div>

            <div class="product-controls">
                <button class="icon" onclick="actualizarCantidad('<?php echo $carrito_id; ?>')">
                    <img class="icon" src="icons/sumarcafe.svg" alt="">

                </button>
                <span class="product-total">
                    $<?php 
                    $precion_por_cantidad = $precion_unitario * $fila['cantidad'];
                    echo number_format($precion_por_cantidad, 2, '.', ','); 
                    ?>
                </span>
                <button class="delete" onclick="eliminarDcarrito('<?php echo $carrito_id; ?>')">
                    <img class="icon" src="icons/delete.svg" alt="">
                </button>
            </div>
        </div>

        <?php 
            $totalGeneral += $precion_por_cantidad;
        endwhile; 
        ?>

        <div class="total-container">
        <form id="comprar" action="opciones_pago.php" method="post" onsubmit="return confirmarCompra()">
    <span class="total-price">Total del Carrito: <?php echo '$', number_format($totalGeneral, 2, '.', ','); ?></span>
    <input type="hidden" name="total" value="<?php echo $totalGeneral; ?>">
    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
    <button class="buy-button" type="submit">Comprar</button>
</form>



        </div>

    <?php else: ?>
        <div class="product"
                style="align-items: center; justify-content: center;
                width: auto;
                
                ">
            <p>No tienes productos en tu carrito.</p>
        </div>
    <?php endif; ?>
    
    <?php mysqli_close($conexion); ?>
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
    function confirmarCompra() {
        return confirm("¿Estás seguro de que deseas proceder con la compra?");
    }
</script>

    <script src="admin/animaciones.js" ></script>

</body>
 </html>