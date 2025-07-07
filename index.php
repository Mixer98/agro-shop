<?php 
    require 'admin/funciones.php';
    
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
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="admin/animaciones.css">



    

    <style>

        .icon{/*todos los iconos*/
            width: 25px;
            height: auto;


        }
        body{

            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px 380px 420px 170px;
            background-repeat: no-repeat; /* Evita la repetición de la imagen y el degradado */

            row-gap: 20px;
        }


        footer{

            
            grid-column: 1/8;
            grid-row: 5/6;

            


        }


    </style>


    <title>Agro Shop</title>

    <header>
        <div id="logo-titulo">
        <img id="logo" src="icons/logo claro.png" alt=""><h1>Agro Shop</h1>


        <link rel="icon" href="icons/logo-claroicono.ico" type="image/x-icon">




        </div>
    </header>   
        <div  id="barras">
            <form id="barrabusqueda" action="buscar.php" method="post">      
                        <input name="busqueda" class="inputbuscar" type="text">
                        <button type="submit" name="busqueda" class="botonbuscar" ><img style="margin-top: 3px;" class="icon" src="icons/Search.png" alt=""></button>
           
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
            <script src="sudmenus.js"></script>


            
        </div>

</head>
<body>
    
<div id="carruselll"  class="slider">
        <div class="slides">

                <?php 

                $sql = "SELECT * FROM promocion"; // Asegúrate de que 'Producto' es el nombre correcto de tu tabla
                $resultado = conectar()->query($sql);


                while ($mostrar = $resultado->fetch_assoc()) {
                    
                $id_producto_promocion = htmlspecialchars($mostrar['id_producto']);

                ?>
                <div class="slide">
                
                    <img src="admin/<?php echo consultar($id_producto_promocion,"producto","imagen"); ?>" alt="">
                    <p><?php echo htmlspecialchars($mostrar['promocion']); ?></p>   
                </div>

            <?php
            }
            ?>                       
        </div>
        
    </div>
        <button id="flecha1" class="prev" onclick="prevSlide()"><img src="icons/izquierdatrans.svg" alt=""></button>
        <button id="flecha2"class="next" onclick="nextSlide()"><img src="icons/derechatrans.svg" alt=""></button>
      
    </div>


        <div id="categoriasbarra">
            
            <img id="digital" src="images/Digital.webp" alt="">

            <div id="categorias">
                <a href="semillas.php"><img src="icons/senillas.png" alt=""><h2>Semillas</h2></a>
                <a href="fertilizantes.php"><img src="icons/fertilizante.png" alt=""><h2>Fertilizante</h2></a>
                <a href="insecticida.php"><img src="icons/insectizida.png" alt=""><h2>Insecticida</h2></a>
                <a href="medicina.php"><img src="icons/medicina.png" alt=""><h2>Medicina</h2></a>
                <a href="alimento.php"><img src="icons/alimentos.png" alt=""><h2>Alimentos</h2></a>
                <a href="animales.php"><img src="icons/pollo.png" alt=""><h2>Animales</h2></a>
            </div>
    </div>


    
<footer>
    <p>&copy; 2024 - Agro Shop</p>
    <div class="social-icons">
        <img style="margin-top: 6px;" class="icon" src="icons/Facebook.svg" alt="JSAIDJA"></a> <a href="#">Facebook</a>
        <img style="margin-top: 6px;" class="icon" src="icons/X.svg" alt="JSAIDJA"></a>  <a href="#">Twitter</a>
        <img style="margin-top: 6px;" class="icon" src="icons/Whatsaap.svg" alt="JSAIDJA"></a>  <a href="#">Whatsaap</a>
    </div>
    <p>Todos los derechos reservados</p>

</footer>



    <script src="carrusel.js"></script>
   


    
</body>


<script src="admin/animaciones.js"></script>
        <script >



</script>

</html>