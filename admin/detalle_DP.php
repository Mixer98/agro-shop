<?php  
            require 'funciones.php';
            // Verificar la sesión
            verificarSesion();
            verificarsecionAdministrativa();



            // Conectar a la base de datos
            $conexion = conectar();

            // Asignar directamente el pedido_id del POST
            $pedido_id= $_POST['id'];

            // Consulta para obtener los detalles del pedido
            $queryDetalle = "
            SELECT p.total, p.fecha, p.estado, u.usuario AS usuario_nombre, p.usuario_id
            FROM pedidos p
            INNER JOIN usuarios u ON p.usuario_id = u.id
            WHERE p.id = $pedido_id
           ";
            $resultadoDetalle = mysqli_query($conexion, $queryDetalle);

            // Verificar si se obtuvieron resultados
            if ($resultadoDetalle) {
                // Obtener detalles del pedido
                $pedido = mysqli_fetch_assoc($resultadoDetalle);
            } else {
                echo "<p>Error al obtener detalles del pedido: " . mysqli_error($conexion) . "</p>";
                exit;
            }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Detalles del Pedido</title>

    <style>

                    /* Contenedor general */
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                background-image: url('../images/fondito8.jpg');
                background-size: cover;
                padding: 20px;
            }

            #contenedor {
                width: 90%;
                max-width: 800px; /* Ajusta el ancho máximo */
                padding: 20px;
                background-color: rgba(240, 234, 210, 0.9);

                backdrop-filter: blur(15px);

                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                position: relative;

            }

            /* Enlace de volver */



            /* Encabezado */
            header {

                padding: 10px;
                border-radius: 5px;
                text-align: center;
                font-family: 'Segoe UI', sans-serif;
                color: rgb(55, 45, 39);
                margin-top: 35px;
            }

            h1 {
                margin: 0px;
                font-size: 1.5em;

                font-family: 'Segoe UI', sans-serif;
                color: rgb(55, 45, 39);

            }

            /* Tabla de detalles */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;

                border-radius: 5px;
                border-spacing: 30 0px; 

                border-collapse: separate;

            }

            th, td {
                padding: 10px;
                text-align: left;

                font-family: 'Segoe UI', sans-serif;
                color: rgb(55, 45, 39);


            }

            th {
                font-family: 'Segoe UI', sans-serif;
                color: rgba(240, 234, 210, 0.9);

                background-color:rgb(55, 45, 39);


                border-radius: 5px;
            }

            /* Formulario de estado */
            form {
                margin-top: 20px;
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }

            select , #actualizar {
                padding: 5px;
                margin-right: 10px;
                border-radius: 5px;
                font-family: 'Segoe UI', sans-serif;


                font-weight: bold;
                height: 40px;
                color: rgba(240, 234, 210, 0.9);
                border: none;
                background-color:rgb(55, 45, 39);
            }




            #volver {
                position: absolute;
                top: 20px;
                left: 20px;

                text-decoration: none;

                margin-bottom: 15pc;
            }

            .icon{


                width: 30px;
            }


            #boton-imprimir {
                position: absolute;
                bottom: 18px;
                right: 14px;

                padding: 10px 15px;
                border: none;
                background-color: rgb(0, 0,0,0);
                cursor: pointer;
            }

    </style>
</head>
<body>

    <div id="contenedor">
        <header ">
        <a  href="pedidos.php" id="volver"><img class="icon" src="../icons/volvercafe.png" alt=""></a>


            <h1 id="elemento1">Detalles del Pedido ID: <?php echo htmlspecialchars($pedido_id); ?></h1>
        </header>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($pedido['usuario_nombre']); ?></td>
                <td><?php echo '$' . number_format($pedido['total'], 2, '.', ','); ?></td>
                <td><?php echo date("d-m-Y H:i:s", strtotime($pedido['fecha'])); ?></td>
                <td><?php echo htmlspecialchars($pedido['estado']); ?></td>
            </tr>
        </tbody>
    </table>

    <h2 id="elemento2">Productos del Pedido</h2>
    <table  id="elemento3">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obtener los detalles de los productos en el pedido
            $queryProductos = "
                SELECT pr.nombre AS producto_nombre, pd.cantidad, pd.precio
                FROM pedido_detalle pd
                INNER JOIN producto pr ON pd.producto_id = pr.id
                WHERE pd.pedido_id = $pedido_id
            ";
            $resultadoProductos = mysqli_query($conexion, $queryProductos);

            if ($resultadoProductos && mysqli_num_rows($resultadoProductos) > 0) {
                while ($detalle = mysqli_fetch_assoc($resultadoProductos)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($detalle['producto_nombre']); ?></td>
                        <td><?php echo htmlspecialchars($detalle['cantidad']); ?></td>
                        <td><?php echo '$' . number_format($detalle['precio'], 2, '.', ','); ?></td>
                    </tr>
                <?php endwhile;
            } else {
                echo "<tr><td colspan='3'>No hay productos en este pedido.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 id="elemnto4">Cambiar Estado del Pedido</h2>
    <form method="POST" action="cambiar_e_pedido.php">
        <select name="nuevo_estado">
            <option value="Pendiente" <?php if ($pedido['estado'] === 'Pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="En Proceso" <?php if ($pedido['estado'] === 'En Proceso') echo 'selected'; ?>>En Proceso</option>
            <option value="Completado" <?php if ($pedido['estado'] === 'Completado') echo 'selected'; ?>>Completado</option>
            <option value="Cancelado" <?php if ($pedido['estado'] === 'Cancelado') echo 'selected'; ?>>Cancelado</option>
        </select>
        <input type="hidden" name="pedido_id" value="<?php echo $pedido_id; ?>">
        <button id="actualizar" type="submit" name="actualizar_estado">Actualizar Estado</button>

    </form>
    <div style="display: flex;
    flex-wrap: nowrap;
    flex-direction: row-reverse;
    margin-right: 58px;
    margin-top: -56px;">
    <img class="icon" style="margin-left: 10px;" src="../icons/envio.svg" alt="">
    <p><?php echo htmlspecialchars(consultar($pedido['usuario_id'],'usuarios','direccion')); ?></p>
     
    </div>

    <button  type="button" onclick="imprimirFactura(<?php echo $pedido_id; ?>)" id="boton-imprimir"><img class="icon" src="../icons/factura cafe.svg" alt=""></button>

    

</div>

<script>

function imprimirFactura(pedidoId) {
    // Obtener el contenedor donde están los datos
    var contenedor = document.getElementById('contenedor');
    
    // Crear una nueva ventana para la impresión
    var ventanaImpresion = window.open('', '', 'height=600,width=800');
    
    // Escribir el HTML para la nueva ventana
    ventanaImpresion.document.write('<html><head><title>Factura de Compra</title>');
    ventanaImpresion.document.write('</head><body>');
    
    // Título de la factura
    ventanaImpresion.document.write('<h1>Factura de Compra</h1>');
    
    // Extraer los datos de la tabla y otros elementos
    var usuario = contenedor.querySelector('tbody tr td:nth-child(1)').innerHTML;
    var total = contenedor.querySelector('tbody tr td:nth-child(2)').innerHTML;
    var fecha = contenedor.querySelector('tbody tr td:nth-child(3)').innerHTML;
    var estado = contenedor.querySelector('tbody tr td:nth-child(4)').innerHTML;
    
    // Agregar los datos de la factura a la nueva ventana
    ventanaImpresion.document.write(`
        <p><strong>ID de Pedido:</strong> ${pedidoId}</p>
        <p><strong>Usuario:</strong> ${usuario}</p>
        <p><strong>Total:</strong> ${total}</p>
        <p><strong>Fecha:</strong> ${fecha}</p>
        <p><strong>Estado:</strong> ${estado}</p>
    `);
    
    // Agregar la tabla de productos
    ventanaImpresion.document.write('<h2>Productos del Pedido</h2>');
    ventanaImpresion.document.write('<table border="1" style="width: 100%; border-collapse: collapse;">');
    ventanaImpresion.document.write(`
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
    `);
    
    // Extraer los datos de los productos
    var productos = contenedor.querySelectorAll('h2 + table tbody tr');
    productos.forEach(function(producto) {
        var nombre = producto.querySelector('td:nth-child(1)').innerHTML;
        var cantidad = producto.querySelector('td:nth-child(2)').innerHTML;
        var precio = producto.querySelector('td:nth-child(3)').innerHTML;

        ventanaImpresion.document.write(`
            <tr>
                <td>${nombre}</td>
                <td>${cantidad}</td>
                <td>${precio}</td>
            </tr>
        `);
    });
    
    ventanaImpresion.document.write('</tbody></table>');
    ventanaImpresion.document.write('</body></html>');
    ventanaImpresion.document.close();
    
    // Imprimir la ventana
    ventanaImpresion.print();
}



</script>

<script src="animaciones.js"></script>



</body>
</html>
