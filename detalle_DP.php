<?php  
            require 'admin/funciones.php';
            // Verificar la sesión
            verificarSesion();
            verificarsecionEstandar();



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
                height: 100vh; /* Ocupa el 100% de la altura de la ventana */
                margin: 0;
                padding: 0px;
                font-family: Arial, sans-serif;
                background-image: url('images/fondito8.jpg');
                background-size: cover;
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
                margin-bottom:  30px;


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
                top: 20px; /* Ajusta según el margen deseado desde abajo */
                right: 20px; /* Ajusta según el margen deseado desde la derecha */

                padding: 10px 15px;
                border: none;
                background-color: rgb(0, 0,0,0);
                cursor: pointer;
            }

            p{

                font-family: 'Segoe UI', sans-serif;
                color: rgb(55, 45, 39);


            }


             /* Media queries para pantallas pequeñas */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.3em;
            }

            table {
                font-size: 0.8em;
            }

            select, #actualizar {
                width: 100%;
                margin-top: 10px;
            }
            #contenedor {
                width: 100%;

                border-radius: 0px;
                min-height: 100%; /* Ocupa el 100% de la altura disponible dentro del body */


                background-color: rgba(240, 234, 210, 0.5);
                backdrop-filter: blur(7px);

            }
            #boton-imprimir{
                top: 10px;
                right: -2px;
            }

            th, td {
                padding: 8px;
                text-shadow: 0 0 1px black;
            }



            header, form {
                text-align: center;
                flex-direction: column;
            }
        }

        /* Media queries para pantallas muy pequeñas */
        @media (max-width: 480px) {
            h1 {
                font-size: 1.1em;
            }

            th, td {
                padding: 8px;
            }

            .icon {
                width: 24px;
            }

            /* Disposición vertical para contenedor */
            #contenedor {
                padding: 10px;
                width: 100%;
            }

    </style>
</head>
<body>

    <div id="contenedor">
        <header>
        <a href="pedidos.php" id="volver"><img class="icon" src="icons/volvercafe.png" alt=""></a>


            <h1>Detalles del Pedido ID: <?php echo htmlspecialchars($pedido_id); ?></h1>
        </header>
        <!-- Dirección del usuario -->

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

    <h2>Productos del Pedido</h2>
   
</p>


    <table>
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
   
    <div style="display: flex; flex-wrap: nowrap; flex-direction: row-reverse;  margin-right: 25px;">
    <img class="icon" style="margin-left: 10px;" src="icons/envio.svg" alt="">
    <p><?php echo htmlspecialchars(consultar($pedido['usuario_id'],'usuarios','direccion')); ?></p>

     
    </div>

    <button type="button" onclick="imprimirFactura(<?php echo $pedido_id; ?>)" id="boton-imprimir"><img class="icon" src="icons/factura cafe.svg" alt=""></button>

    

</div>

<script>

function imprimirFactura(pedidoId) {
    // Obtener el contenedor donde están los datos
    var contenedor = document.getElementById('contenedor');
    
    // Crear una nueva ventana para la impresión
    var ventanaImpresion = window.open('', '', 'height=600,width=400'); // Reducir el ancho para un formato tipo ticket
    
    // Escribir el HTML para la nueva ventana
    ventanaImpresion.document.write('<html><head><title>Factura de Compra</title>');
    
    // Agregar estilo para formato tipo ticket
    ventanaImpresion.document.write(`
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                width: 300px; /* Ancho similar al de un ticket */
                margin: 0 auto;
                text-align: center;
            }
            h1, h2 {
                margin: 5px 0;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }
            table, th, td {
                border: 1px solid #000;
            }
            th, td {
                padding: 5px;
                text-align: left;
                font-size: 12px;
            }
            .table-header th {
                text-align: center;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            .total-row td {
                font-weight: bold;
            }
        </style>
    `);

    ventanaImpresion.document.write('</head><body>');

    // Título de la factura
    ventanaImpresion.document.write('<h1>Factura de Compra</h1>');

    // Extraer los datos principales del pedido
    var usuario = contenedor.querySelector('tbody tr td:nth-child(1)').innerHTML;
    var total = contenedor.querySelector('tbody tr td:nth-child(2)').innerHTML;
    var fecha = contenedor.querySelector('tbody tr td:nth-child(3)').innerHTML;
    

    // Agregar los datos del pedido en una tabla
    ventanaImpresion.document.write(`
        <table>
            <tr><td><strong>ID de Pedido:</strong> ${pedidoId}</td></tr>
            <tr><td><strong>Usuario:</strong> ${usuario}</td></tr>
            <tr><td><strong>Total:</strong> ${total}</td></tr>
            <tr><td><strong>Fecha:</strong> ${fecha}</td></tr>
  
        </table>
    `);

    // Agregar título de productos
    ventanaImpresion.document.write('<h2>Productos del Pedido</h2>');
    
    // Agregar la tabla de productos
    ventanaImpresion.document.write('<table>');
    ventanaImpresion.document.write(`
        <thead class="table-header">
            <tr>
                <th>Producto</th>
                <th>Cant.</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
    `);

    // Extraer los datos de los productos de la segunda tabla dentro del contenedor
    var productosTabla = contenedor.querySelectorAll('table')[1]; // Selecciona la segunda tabla
    var productos = productosTabla.querySelectorAll('tbody tr');

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

    // Cerrar tabla y cuerpo del HTML de la nueva ventana
    ventanaImpresion.document.write('</tbody></table>');

    // Agregar total al final
    ventanaImpresion.document.write(`
        <table>
            <tr class="total-row"><td>Total:</td><td colspan="2" style="text-align:right;">${total}</td></tr>
        </table>
    `);

    ventanaImpresion.document.write('</body></html>');
    ventanaImpresion.document.close();
    
    // Imprimir la ventana
    ventanaImpresion.print();
}


</script>

<script src="admin/animaciones.js"></script>

</body>
</html>