
<?php


session_start();

require 'funciones.php';



$id = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background: url('../images/fondito3.jpg') no-repeat center center fixed;
                background-size: cover;
            }

            .container {
                background-color: rgba(108, 88, 76, 0.8);
                max-width: 400px;
                margin: auto;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 95%;
                backdrop-filter: blur(15px);
            }

            h2, h3 {
                font-family: 'Segoe UI', sans-serif;
                font-size: 20px;
                font-weight: normal;
                color: rgb(240, 234, 210);
                text-shadow: 0px 0px 15px rgba(0, 0, 0);
            }

            .informacion {
                font-family: 'Segoe UI', sans-serif;
                padding: 9px;
                background-color: rgba(240, 234, 210, 0.5);
                color: rgb(55, 45, 39);
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(240, 234, 210, 0.3);
                text-align: left;
                width: 400px;
                margin: 20px auto;
                backdrop-filter: blur(10px);
            }

            .info-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .info-item h3 {
                font-size: 18px;
                margin: 0;
                color: rgb(240, 234, 210);
                flex: 0 0 100px;
            }

            .info-item p, #descrip {
                font-size: 1em;
                color: rgb(240, 234, 210);
                text-align: left;
            }

            button {
                border: none;
                background: none;
                cursor: pointer;
                padding: 5px;
            }

            .iconos {
                width: 20px;
                filter: drop-shadow(0px 0px 1px rgba(240, 234, 210, 0.8));
            }

            #selectRolContainer {
                display: none;
            }

            select {
                font-family: 'Segoe UI', sans-serif;
                font-size: 16px;
                padding: 5px;
                border-radius: 5px;
                background-color: rgba(240, 234, 210, 0.8);
                color: rgb(55, 45, 39);
                margin: 5px 0;
                border: 1px solid rgba(55, 45, 39, 0.5);
            }

            select:hover {
                background-color: rgba(240, 234, 210, 0.9);
            }

            #btn_guardar {
                text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
                border-radius: 5px;
                font-family: 'Segoe UI', sans-serif;
                font-size: 18px;
                padding: 10px 20px;
                backdrop-filter: blur(12px);
                background-color: rgb(240, 234, 210);
                color: rgb(55, 45, 39);
                cursor: pointer;
                transition: background-color 0.3s;
            }

            #btn_guardar:hover {
                background-color: rgb(75, 65, 59);
                color: white;
            }

    </style>


</head>
<body>


<div id="contenedorUS" class="container">

        <div class="top-right">
            <a href="usuarios.php">
                <img class="iconos" src="../icons/volverclaro.png" alt="Volver">
            </a>
        </div>

        <div class="info-item">
            <h3>Docuemnto:</h3>
            <p><?php echo consultar($id, 'usuarios', 'documento'); ?></p>
            <button onclick="editarDato(<?php echo $id; ?>, 'documento')">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
        </div>

        <div class="info-item">
            <h3>Nombre:</h3>
            <p><?php echo consultar($id, 'usuarios', 'usuario'); ?></p>
            <button onclick="editarDato(<?php echo $id; ?>, 'usuario')">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
        </div>

        <div class="info-item">
            <h3>Correo:</h3>
            <p><?php echo consultar($id, 'usuarios', 'correo'); ?></p>
            <button onclick="editarDato(<?php echo $id; ?>, 'correo')">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
        </div>

        <div class="info-item">
            <h3>Edad:</h3>
            <p><?php echo consultar($id, 'usuarios', 'edad'); ?></p>
            <button onclick="editarDato(<?php echo $id; ?>)">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
        </div>

        <div class="info-item">
            <h3>Contraseña:</h3>
            <p><?php echo consultar($id, 'usuarios', 'contrasena'); ?></p>
            <button onclick="cambiarContrasena(<?php echo $id; ?>, 'contrasena')">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
        </div>

        <div class="info-item">
            <h3>Dirección:</h3><br>

            <p id="descrip" ><?php echo consultar($id, 'usuarios', 'direccion'); ?></p>

            
        </div>
        <div class="info-item">
            <h3>Rol:</h3>

            <p><?php echo consultar($id, 'usuarios', 'rol'); ?></p>

            <button onclick="mostrarSelect(<?php echo $id; ?>)">
                <img class="iconos" src="../icons/Formulario.svg" alt="Editar">
            </button>
            <div id="selectRolContainer" style="display: none;">
            <select id="selectRol" onchange="cambiarRol(<?php echo $id; ?>)">
                <option>.</option>
                <option value="Admin">Admin</option>
                <option value="Usuario">Usuario</option>
            </select>





            
            
            </div>

            
        </div>


        
       
        </div>


    

<div>


</body>


<script>
    // Muestra el select para editar el rol
    function mostrarSelect(id) {
        document.getElementById('selectRolContainer').style.display = 'inline'; // Mostrar el select
        document.getElementById('selectRol').value = document.getElementById('rol').innerText; // Poner el valor actual como seleccionado
    }


    // Cambia el rol al seleccionar una nueva opción
    function cambiarRol(id) {
    const nuevoValor = document.getElementById('selectRol').value;

    // Confirmación antes de realizar el cambio
    if (confirm(`¿Estás seguro de que deseas cambiar el rol a ${nuevoValor}?`)) {
        // Enviar la actualización mediante fetch
        fetch('editarUsuariologica.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // El encabezado correcto para datos URL codificados
            },
            body: `id=${id}&columna=rol&nuevo_valor=${encodeURIComponent(nuevoValor)}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Mostrar respuesta del servidor
            location.reload(); // Recargar la página para mostrar el nuevo valor
        })
        .catch(error => console.error('Error:', error));
    } else {
        // Si el usuario cancela, simplemente oculta el select
        document.getElementById('selectRolContainer').style.display = 'none';
    }
    }


        function editarDato(id, columna) {
            const nuevoValor = prompt(`Introduce el nuevo valor para ${columna}:`);
            if (nuevoValor !== null) {
                fetch('editarUsuariologica.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&columna=${columna}&nuevo_valor=${encodeURIComponent(nuevoValor)}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Recargar la página para mostrar el nuevo valor
                })
                .catch(error => console.error('Error:', error));
            }
        }
</script>


<script src="animaciones.js" ></script>
</html>