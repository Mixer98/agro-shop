<?php  

require 'funciones.php';
// Conectar a la base de datos


verificarSesion();

verificarsecionAdministrativa();

$conexion = conectar();

// Consulta para obtener todos los pedidos junto con la información del usuario
$queryPedidos = "
    SELECT p.id AS pedido_id, p.total, p.fecha, p.estado, u.usuario AS usuario_nombre, 
           SUM(pd.precio * pd.cantidad) AS costo_total, 
           (p.total - SUM(pd.precio * pd.cantidad)) AS ganancia
    FROM pedidos p
    INNER JOIN usuarios u ON p.usuario_id = u.id
    INNER JOIN pedido_detalle pd ON p.id = pd.pedido_id
    GROUP BY p.id, u.usuario
    ORDER BY p.fecha DESC
";

$resultadoPedidos = mysqli_query($conexion, $queryPedidos);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="barras.css">

    <link rel="stylesheet" href="sudmenunavbar.css">

    <link rel="stylesheet" href="tablas.css">

    <link rel="stylesheet" href="../footer.css">


    <style>         
               
               body{
                    display: grid;
                    grid-template-columns: repeat(5,1fr);
                    grid-template-rows: 1fr 38px minmax(300px,auto) 170px;

                    row-gap: 20px;
                    }
                footer{                     
                grid-column: 1/8;
                grid-row: 4;
                }

                .contenedorpedidos{

                grid-column: 1/8;
                grid-row: 3;

                 }


        </style>



    <title>Gestion De Usuario</title>
    <header>
        <div id="logo-titulo">
            <img id="logo" src="../icons/Caja.svg" alt=""><h1>Pedidos</h1>
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





<div class="contenedorpedidos">
        <?php if (mysqli_num_rows($resultadoPedidos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Pedido ID</th>
                        <th>Usuario</th>
                        <th>Total Pagado</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Costo Total</th>
                        <th>Ganancia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($pedido = mysqli_fetch_assoc($resultadoPedidos)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($pedido['pedido_id']); ?></td>
                            <td><?php echo htmlspecialchars($pedido['usuario_nombre']); ?></td>
                            <td><?php echo '$' . number_format($pedido['total'], 2, '.', ','); ?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($pedido['fecha'])); ?></td>
                            <td><?php echo htmlspecialchars($pedido['estado']); ?></td>
                            <td><?php echo '$' . number_format($pedido['costo_total'], 2, '.', ','); ?></td>
                            <td><?php echo '$' . number_format($pedido['ganancia'], 2, '.', ','); ?></td>
                            <td class="iconfila">
                                <button onclick="verDetalles(<?php echo $pedido['pedido_id']; ?>)" class="button"><img class="iconos" src="../icons/info.svg" alt=""></button>
                            </td>


                        
                        
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay pedidos registrados.</p>
        <?php endif; ?>

        <?php 
        // Cerrar conexión
        mysqli_close($conexion); 
        ?>
    </div>


    <footer>
    <p>&copy; 2024 - Agro Shop</p>
    <div class="social-icons">
        <img style="margin-top: 6px;" class="icon" src="../icons/Facebook.svg" alt="JSAIDJA"></a> <a href="#">Facebook</a>
        <img style="margin-top: 6px;" class="icon" src="../icons/X.svg" alt="JSAIDJA"></a>  <a href="#">Twitter</a>
        <img style="margin-top: 6px;" class="icon" src="../icons/Whatsaap.svg" alt="JSAIDJA"></a>  <a href="#">Whatsaap</a>
    </div>
    <p>Todos los derechos reservados</p>

     </footer>
   


    <script>
       function verDetalles(pedido_id) {
    // Crear un formulario
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




    </script>
        <script src="sudmenus.js"></script>

        <script src="animaciones.js"></script>
</body>
</html>