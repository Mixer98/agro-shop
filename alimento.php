<?php 
    require 'admin/funciones.php';

    session_start();

    verificarSesion();

    verificarsecionEstandar();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloindex.css">
    <link rel="stylesheet" href="sudmenunavbar.css">
    <link rel="stylesheet" href="carrusel.css">
    <link rel="stylesheet" href="contenedorproductos.css">
    <link rel="stylesheet" href="footer.css">
    <title>Alimentos</title>


    <style>

        body{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px minmax(519px,auto)  170px ;
            row-gap: 15px;
    
        }

        .contenedorproductos{
            grid-column: 1/6;
            grid-row: 3/4;
        }


        footer{                           
        grid-column: 1/8;
        grid-row: 4;
        }


    </style>

    <header>
        <div id="logo-titulo">
        <img id="logo" src="icons/logo claro.png" alt=""><h1>Alimentos</h1>
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

<div class="contenedorproductos">
    <?php 
    $sql = "SELECT * FROM producto";
    $resultado = conectar()->query($sql);

    while ($mostrar = $resultado->fetch_assoc()) {

        $id_producto = htmlspecialchars($mostrar['id']);

        $categoria= consultar($id_producto,"producto","categoria");


        if ( $categoria =="alimento") {
        
        
    ?>

    <div class="producto">
        <img src="admin/<?php echo consultar($id_producto,"producto","imagen");?>" alt="Producto" class="producto-imagen">
        <h2 class="producto-nombre"><?php echo consultar($id_producto,"producto","nombre"); ?></h2>
        <p class="producto-precio">
            
            
            <?php 
        
        
        if (consultar($id_producto,'producto','descuento')>0) {

            ?>
            <td style="display: flex; align-items: center;">
            <button style="border-radius: 100px;" style="height: auto;" style="width: auto;" class="btn btn-danger" onclick="descuento(
            '<?php echo consultar($id_producto,'producto','precio'); ?>', 
            '<?php echo consultar($id_producto,'producto','descuento'); ?>', 
            '<?php echo consultar($id_producto,'producto','precio_con_descuento') ;?>')">
            

            
            <img class="icon" src="icons/descuento.svg">
            </button>

        
            </button>
            
            <?php echo '$', 
            
            number_format(consultar($id_producto,'producto','precio_con_descuento') 
            
            

            , 2, '.', ',');

            
            


        }else{

            echo '$', 



            
            
            number_format(consultar($id_producto,'producto','precio') 
            
            

            , 2, '.', ',');

            

        }
        
        
        
        
        
        
        ?></p>
        <div class="botones">
            <button class="btn icono comprar" onclick="gcarrito('<?php echo $mostrar['id']; ?>')">
                <img src="icons/carrito.svg" alt="Comprar" class="icono-img">
            </button>
            <button class="btn icono carrito" onclick="info('<?php echo $mostrar['id']; ?>')">
                <img src="icons/info.svg" alt="Añadir al Carrito" class="icono-img">
            </button>
        </div>




    </div>

    <?php

        }


    }
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


<script src="admin/animaciones.js" ></script>
</body>
 </html>