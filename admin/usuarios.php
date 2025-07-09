<?php 

    require_once('funciones.php');


    verificarSesion();

    verificarsecionAdministrativa();
   


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="barras.css">
    <link rel="stylesheet" href="tablas.css">
    <link rel="stylesheet" href="../footer.css">

    <link rel="stylesheet" href="sudmenunavbar.css">
    <title>Gestion De Usuario</title>
<style>



    body{display: grid;
            grid-template-columns: repeat(5,1fr);
            grid-template-rows: 1fr 38px minmax(354px,auto) 170px;
            row-gap: 20px;

    }

    table{

        grid-row: 3;

        grid-column: 2/5 ;
    }

    footer{                     
        grid-column: 1/8;
        grid-row: 4;
        }


    @media (max-width:974px) {
        table {

            grid-column: 1/6;
        }
    }


    @media (max-width:714px) {
        table {

            
        }

        th, td {
             padding: 0px;

        }
    }
      @media (max-width:590px) {
        table {

            
        }

        th, td {
             padding: 0px;

        }


        .iconos {
            width: 14px;
            filter: drop-shadow(0px 0px 100px rgb(240, 234, 210));
        }


        tr th {

            font-size: 8px;
        
        }
    }




</style>


    <header>
        <div id="logo-titulo">
            <img id="logo" src="../icons/usuario.svg" alt="">
            <h1>Usuarios</h1>
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
<script src="sudmenus.js"></script>

        <table>
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Genero</th>

                    <th>Rol</th> 

                </tr>
            </thead>

            <tbody>          
            <?php 
            

            


            

            $sql ="SELECT * FROM usuarios";
            $resultado = conectar() ->query($sql);

            while ($mostrar = $resultado->fetch_assoc()) {

                ?>
            <tr>
                <td><?php echo $mostrar['id']; ?></td>
                <td><?php echo $mostrar['usuario'];?></td>
                <td><?php echo $mostrar['correo']; ?></td>
                <td><?php echo $mostrar['sexo']; ?></td>

                <td><?php echo $mostrar['rol']; ?></td>
                <td><button class="btn btn-danger" onclick="editar('<?php echo $mostrar['id']; ?>')">

                    <img class="iconos" src="../icons/editar.svg">
                
                </button></td>


                <td><button class="btn btn-danger" onclick="eliminar('<?php echo $mostrar['id']; ?>')">

                    <img class="iconos" src="../icons/eliminar.svg">
                
                </button></td>
            <?php
            }
            ?>
            </tr>
        </tbody>
        </table>

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
            function editar(id) {
                if (confirm('editar usuario')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'infop.php';
                    
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
                if (confirm('desea eliminar a este usuario?')) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'eliminarusuario.php';
                    
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id';
                    input.value = id;
                    
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        </script>

        <script src="animaciones.js"></script>

</body>
</html>