
<?php 
    require 'funciones.php';

session_start();
   
verificarsecionAdministrativa();
 verificarSesion();

  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    
    <link rel="stylesheet" href="sudmenunavbar.css">
    
    <link rel="stylesheet" href="tablas.css">

    <link rel="stylesheet" href="../footer.css">

<style>

    body{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px 380px auto 170px;
            row-gap: 20px;

    }
    table{

        grid-column: 1/6;
        grid-row: 4/5;


    }

    #barrapersonal{

        position: relative;
   z-index: 10; 
  
    }

    footer{                     
        grid-column: 1/8;
        grid-row: 5;
        }




</style>
     <link rel="stylesheet" href="barras.css">
    <link rel="stylesheet" href="carrusel.css">

    <title>Sesion Administrativa</title>
    <header>
        <div id="logo-titulo">
            <h1>Sesion Administrativa</h1>
        </div>
    </header>

    <div id="barras">
        <div id="barrabusqueda">          
                    <input class="inputbuscar" type="text">
                    <button class="botonbuscar" ><img style="margin-top: 3px;" class="icon" src="../icons/Search.png" alt=""></button>
        </div>

        <nav>  
            <a href="adminindex.php"><img  style="margin-top: 4px;" class="icon" src="../icons/homecafe.png" alt=""></a>
            <a href="usuarios.php">Usuarios</a>
            <a href="pedidos.php">Pedidos</a>
            <a href="inventario.php">Inventario</a>
            <a href="formularproducto.php">Formular</a>

        </nav>

        <div id="barrapersonal" class="sudmenuoculto">
            <a href="#"><img class="icon" src="../icons/Notify.png" alt="Notificaciones"></a>
            <a href="#" class="icon-link" onclick="toggleUserMenu()">
                <img class="icon" src="../icons/User.png" alt="Usuario">
            </a>
            <div id="userMenu" class="user-menu">
                <a href="#">Hola <?php echo $_SESSION['usuario'] ?> </a>
                <a href="editarU.php">Configuración</a>
                <a href="../cerrar.php">Cerrar sesión</a>
                
            </div>
        </div>

    </div>
    
</head>
<body>


    <div id="carruselll" class="slider">
        <div class="slides">

                <?php 

                $sql = "SELECT * FROM promocion"; // Asegúrate de que 'Producto' es el nombre correcto de tu tabla
                $resultado = conectar()->query($sql);


                while ($mostrar = $resultado->fetch_assoc()) {
                    
                $id_producto_promocion = htmlspecialchars($mostrar['id_producto']);

                ?>
                <div class="slide">
                
                    <img src="./<?php echo consultar($id_producto_promocion,"producto","imagen"); ?>" alt="">
                    <p><?php echo htmlspecialchars($mostrar['promocion']); ?></p>   
                </div>


                
            <?php
            }
            ?>                       
        </div>
        
    </div>
        <button id="flecha1" class="prev" onclick="prevSlide()"><img src="../icons/izquierdatrans.svg" alt=""></button>
        <button id="flecha2"class="next" onclick="nextSlide()"><img src="../icons/derechatrans.svg" alt=""></button>
      
    </div>
    
    <table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Promocion</th>

        </tr>
    </thead>
    <tbody>          
    <?php 


    $sql = "SELECT * FROM promocion"; // Asegúrate de que 'Producto' es el nombre correcto de tu tabla
    $resultado = conectar()->query($sql);



    while ($mostrar = $resultado->fetch_assoc()) {



        $id_producto_promocion_tabla = htmlspecialchars($mostrar['id_producto']);

        


    ?>
        <tr>
            <td><?php echo consultar($id_producto_promocion_tabla,'producto','nombre'); ?></td>
            <td><?php echo htmlspecialchars($mostrar['promocion']); ?></td>
            <td class="iconfila"><button class="btn btn-danger" onclick="eliminar('<?php echo (int)$mostrar['id']; ?>')">
            <img class="iconos" src="../icons/eliminar.svg" alt="">
                </button>
            </td>
        </tr>
    <?php
    }
    ?>




    </tbody>
    
    <footer>
    <p>&copy; 2024 - Agro Shop</p>
    <div class="social-icons">
        <img style="margin-top: 6px;" class="icon" src="../icons/Facebook.svg" alt="JSAIDJA"></a> <a href="#">Facebook</a>
        <img style="margin-top: 6px;" class="icon" src="../icons/X.svg" alt="JSAIDJA"></a>  <a href="#">Twitter</a>
        <img style="margin-top: 6px;" class="icon" src="../icons/Whatsaap.svg" alt="JSAIDJA"></a>  <a href="#">Whatsaap</a>
    </div>
    <p>Todos los derechos reservados</p>

     </footer>


</table>
      



<script>


    function eliminar(id) {
        if (confirm('¿Desea eliminar la promoción?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'eliminarpromo.php';

            // Crear campo oculto para la ID
            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;
            form.appendChild(inputId);

            document.body.appendChild(form);
            form.submit();
        }
    }

    


</script>
<script src="animaciones.js"></script>
<script src="sudmenus.js"></script>
<script src="carrusel.js"></script>
</body>
</html>