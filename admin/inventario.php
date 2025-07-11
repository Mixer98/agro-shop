
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
    <link rel="stylesheet" href="barras.css">
    <link rel="stylesheet" href="tablas.css">
    <link rel="stylesheet" href="sudmenunavbar.css">
    <link rel="stylesheet" href="sudmenutabla.css">

    <style>


        body{
                display: grid;
                    grid-template-columns: repeat(5,1fr);
                    grid-template-rows: 1fr 38px minmax(300px,auto);

                
                }

                .contenedortabla{
                    grid-column: 1/6; 
                    grid-row: 3;
                }



                 @media (max-width:974px) {
                    table {

                        grid-column: 1/6;
                        display: block;
                        overflow-x: auto;
                        white-space: nowrap;

                    }
                }


    </style>
    
    <title>Gestion De Usuario</title>
    <header>
    <div id="logo-titulo">
            <img id="logo" src="../icons/Iventario.svg" alt=""><h1>Inventario</h1>
        </div>
            
        </div>

        <style>
               
        </style>
    </header>
    <div id="barras">
        <div id="barrabusqueda">          
                    <input class="inputbuscar" id="imputbuscar" type="text">
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
                <a href="#">Hola <?php 
                session_start();

                
                
                echo $_SESSION['usuario'] ?> </a>
                <a href="editarU.php">Configuración</a>
                <a href="../cerrar.php">Cerrar sesión</a>
                
            </div>
        </div>


 </div>
</head>
<body>
    <div class="contenedortabla"> 
    <table id="mitabla" > 
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Subtipo</th>
            <th>Medida</th>
            <th>Unidad de Medida</th>
            <th>Unidades Disponibles</th>
            <th>Precio</th>
            <th>Tipo de Almacenamiento</th>
            <th>Almacenado</th>


        </tr>
    </thead>
    <tbody>          
    <?php 
    require 'funciones.php';

    $sql = "SELECT * FROM producto"; // Asegúrate de que 'Producto' es el nombre correcto de tu tabla
    $resultado = conectar()->query($sql);

    while ($mostrar = $resultado->fetch_assoc()) {
    ?>
        <tr>
            

            <td><?php echo htmlspecialchars($mostrar['nombre']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['marca']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['categoria']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['subtipo']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['medida']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['unidad_medida']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['unidades_disponibles']); ?></td>
            
            <?php
            require_once  'funciones.php';
            
            $comprobardescuento = consultar($mostrar['id'],'producto','descuento');


                if ($comprobardescuento>0) {

                    ?>
                    <td style="display: flex; align-items: center;">
                    <button style="border-radius: 100px;" style="height: auto;" style="width: auto;" class="btn btn-danger" onclick="descuento('<?php echo $mostrar['precio']; ?>', '<?php echo $mostrar['descuento']; ?>', '<?php echo $mostrar['precio_con_descuento']; ?>')">
                    <img class="iconos" src="../icons/descuento.svg">
                    </button>

                
                    </button>
                    
                    <?php echo'$'. number_format($mostrar['precio_con_descuento'], 2, '.', ',');
                    
                    
                    ?></td>
                    <?php
      
                }else{

                    ?>
                    <td><?php echo'$'.  number_format($mostrar['precio'], 2, '.', ','); 
                    
                    
                    ?></td>
                    <?php
                }
            ?>




            
            <td><?php echo htmlspecialchars($mostrar['tipo_almacenamiento']); ?></td>
            <td><?php echo htmlspecialchars($mostrar['lugar_almacenamiento']); ?></td>

            <td class="iconfila">
                <button class="btn btn-danger" onclick="toggleSubMenu(this)"><img class="iconos" src="../icons/configcafe.svg" alt=""></button>
                <div class="submenu" style="display:none;">
                <button class="btn btn-danger" onclick="enviarPromocion('<?php echo $mostrar['id'];?>')"><img class="iconos" src="../icons/promo.svg" alt=""></button>
                <button class="btn btn-danger" onclick="detalles('<?php echo $mostrar['id']; ?>')"><img class="iconos" src="../icons/info.svg" alt=""></button>
                    <button class="btn btn-danger" onclick="editar('<?php echo $mostrar['id']; ?>')"><img class="iconos" src="../icons/editar.svg" alt=""></button>
                    <button class="btn btn-danger" onclick="eliminar('<?php echo $mostrar['id']; ?>')"><img class="iconos" src="../icons/eliminar.svg" alt=""></button>
                    
                    
                </div>
            </td>

            
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>



<script>
            function detalles(id) {
                if (confirm('Asi vera el producto El Usuario')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'producto.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id';
                    input.value = id;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }



            function editar(id) {
                if (confirm('Desea Editar el Producto')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'editarp.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id';
                    input.value = id;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }


            function eliminar(id) {
                if (confirm('Desea Eliminar el Producto')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'eliminarp.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id';
                    input.value = id;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }





            function enviarPromocion(id) {
                if (confirm('Dese Propocionar El Producto')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'promocionar.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id';
                    input.value = id;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }


         }



         function descuento(precioOriginal, porcentajeDescuento, precioConDescuento) {
    // Convertir las variables a números si están en formato de texto
        precioOriginal = parseFloat(precioOriginal);
        porcentajeDescuento = parseFloat(porcentajeDescuento);
        precioConDescuento = parseFloat(precioConDescuento);

        // Formatear los precios a pesos colombianos
        let precioOriginalCol = precioOriginal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
        let precioConDescuentoCol = precioConDescuento.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });

        // Mostrar el mensaje con las variables formateadas
        alert("Precio original: " + precioOriginalCol +
            "\nPorcentaje de descuento: " + porcentajeDescuento + "%" +
            "\nPrecio con descuento: " + precioConDescuentoCol);
    }




            function toggleSubMenu(button) {
            const submenu = button.nextElementSibling;

            if (submenu.style.display === 'none' || !submenu.style.display) {
                submenu.style.display = 'flex';
                submenu.style.pointerEvents = 'none'; // Bloquea interacción momentáneamente
                submenu.style.transform = 'translateY(-20px)';
                submenu.style.opacity = '0';
                submenu.style.transition = 'transform 0.3s ease, opacity 0.3s ease';

                setTimeout(() => {
                    submenu.style.transform = 'translateY(0)';
                    submenu.style.opacity = '1';
                }, 10);

                // Después de animar, activar eventos de cierre
                setTimeout(() => {
                    submenu.style.pointerEvents = 'auto';

                    // Detectar clic fuera
                    function closeOnClickOutside(event) {
                        if (!submenu.contains(event.target) && !button.contains(event.target)) {
                            closeAnimated(submenu);
                            document.removeEventListener('click', closeOnClickOutside);
                            submenu.removeEventListener('mouseleave', closeOnMouseLeave);
                        }
                    }

                    // Detectar salida del mouse
                    function closeOnMouseLeave() {
                        closeAnimated(submenu);
                        document.removeEventListener('click', closeOnClickOutside);
                        submenu.removeEventListener('mouseleave', closeOnMouseLeave);
                    }

                    document.addEventListener('click', closeOnClickOutside);
                    submenu.addEventListener('mouseleave', closeOnMouseLeave);
                }, 310);
            } else {
                // Ya está abierto, entonces lo cerramos con animación
                closeAnimated(submenu);
            }
        }

        function closeAnimated(element) {
            element.style.transform = 'translateY(-20px)';
            element.style.opacity = '0';
            setTimeout(() => {
                element.style.display = 'none';
                element.style.transform = '';
                element.style.opacity = '';
            }, 300);
        }


         // Obtiene el input y la tabla
            const filterInput = document.getElementById('imputbuscar');
            const table = document.getElementById('mitabla');
            const tbody = table.querySelector('tbody');

            // Añade un evento para filtrar las filas cuando se escribe en el input
            filterInput.addEventListener('keyup', function() {
                const filterValue = filterInput.value.toLowerCase();
                const rows = tbody.getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let rowContainsFilter = false;

                    // Revisa todas las celdas de la fila
                    for (let j = 0; j < cells.length; j++) {
                        if (cells[j].textContent.toLowerCase().indexOf(filterValue) > -1) {
                            rowContainsFilter = true;
                            break;
                        }
                    }

                    // Muestra u oculta la fila basada en el filtro
                    rows[i].style.display = rowContainsFilter ? '' : 'none';
                }
            });




        </script>

            <script  src="sudmenus.js"></script>
            <script src="animaciones.js"></script>



        
</body>
</html>