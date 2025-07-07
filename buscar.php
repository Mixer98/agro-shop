<?php

require 'admin/funciones.php';

session_start();

verificarSesion();

verificarsecionEstandar();


$busqueda = $_POST['busqueda'];




$conn = conectar();

$sql = "SELECT * FROM producto WHERE 
            nombre LIKE ? OR 
            marca LIKE ? OR 
            categoria LIKE ? OR 
            subtipo LIKE ? OR 
            medida LIKE ? OR 
            unidad_medida LIKE ? OR 
            unidades_disponibles LIKE ? OR 
            precio LIKE ? OR 
            tipo_almacenamiento LIKE ? OR 
            lugar_almacenamiento LIKE ? OR 
            descripcion LIKE ?";

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);
$param = "%" . $busqueda . "%";
$stmt->bind_param("sssssssssss",$param, $param, $param, $param, $param, $param, $param, $param, $param, $param, $param);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="contenedorproductos2.css">
    <link rel="stylesheet" href="estiloindex.css">
    <link rel="stylesheet" href="sudmenunavbar.css">
    <link rel="stylesheet" href="footer.css">


    <style>

        body{
            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px minmax(300px,auto) 170px;


            row-gap: 20px;

        }

        .contenedorproductos{

            grid-row: 3/4;
            grid-column: 1/6;


        }

        footer{                     
        grid-column: 1/8;
        grid-row: 4/5;
        }
        #nada{

            grid-column: 1/8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            color: rgb(240,234,210);
            cursor: pointer;

            text-shadow: 0px 0px 15px black;
        }


        




    </style>

    <title>Buscar</title>

    <header>
        <div id="logo-titulo">
        <img id="logo" src="icons/logo claro.png" alt=""> <h1>Agro Shop</h1>
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
<?php 

if ($stmt->execute()) {
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Contenedor padre
        ?>
        <div class="contenedorproductos">
        <?php

        // Mostrar cada producto
        while ($fila = $resultado->fetch_assoc()) {


             $id_usar = $fila['id'];
            ?>
            <div class="producto">
                <img class="producto-imagen" src="admin/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>">
                <h2><?php echo $fila['nombre']; ?></h2>
                <p>Marca: <?php echo $fila['marca']; ?></p>
                <p>Categoría: <?php echo $fila['categoria']; ?></p>
                <p>Subcategoría: <?php echo $fila['subtipo']; ?></p>
                <p><?php echo $fila['medida'].' '; ?> 
                 <?php echo $fila['unidad_medida']; ?></p>
                <p>Unidades disponibles: <?php echo $fila['unidades_disponibles']; ?></p>
                <p><?php 
        
        
        if (consultar($id_usar,'producto','descuento')>0) {

            ?>
            <td style="display: flex; align-items: center;">
            <button style="border-radius: 100px;" style="height: auto;" style="width: auto;" class="btn btn-danger" onclick="descuento(
            '<?php echo consultar($id_usar,'producto','precio'); ?>', 
            '<?php echo consultar($id_usar,'producto','descuento'); ?>', 
            '<?php echo consultar($id_usar,'producto','precio_con_descuento') ;?>')">
            

            
            <img class="icon" src="icons/descuento.svg">
            </button>


            
            <?php echo '$', 


        number_format(consultar($id_usar,'producto','precio_con_descuento') 
            
            

            , 2, '.', ',');

        }else{

            echo '$', 


            number_format(consultar($id_usar,'producto','precio')
            
            

            , 2, '.', ',');
            
            
            

        }
        
        
        
        
        
        
        ?></p>

                <div class="botones">

                <button style="margin: 20px;" class="btn icono carrito" onclick="info('<?php echo $id_usar; ?>')">
                    <img src="icons/info.svg" alt="Añadir al Carrito" class="icono-img" >
                </button>
            </div>

            </div>
            <?php
        }

        ?>
        </div>
        <?php
    } else {

        ?>
          <h3 id="nada"><?php          echo "No se encontraron resultados."; ?></h3>


          <?php
    }
} else {
    echo "Error en la consulta: " . $stmt->error;
}

// Cerrar el statement
$stmt->close();

?>



    <footer>
    <p>&copy; 2024 - Agro Shop</p>
    <div class="social-icons">
        <img style="margin-top: 6px;" class="icon" src="icons/Facebook.svg" alt="JSAIDJA"></a> <a href="#">Facebook</a>
        <img style="margin-top: 6px;" class="icon" src="icons/X.svg" alt="JSAIDJA"></a>  <a href="#">Twitter</a>
        <img style="margin-top: 6px;" class="icon" src="icons/Whatsaap.svg" alt="JSAIDJA"></a>  <a href="#">Whatsaap</a>
    </div>
    <p>Todos los derechos reservados</p>

     </footer>

        <script src="funciones.js"></script>

        <script>

            function info(id) {
                if (confirm('Informacion')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'producto_buscado.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id_producto';
                    input.value = id;
                
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }






        </script>



<script src="admin/animaciones.js"></script>
</body>

</html>
