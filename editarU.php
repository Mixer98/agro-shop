
<?php

session_start();

require 'admin/funciones.php';



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
    background-image: url(images/fondito2.jpg);
    background-size: cover;
}

.container {
    
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(15px);
    display: flex;
    flex-direction: column;
    background-color: rgba(108, 88, 76, 0.8); /* Fondo similar al contenedor de dirección */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra ligera */
    color: rgb(55, 45, 39); /* Color de texto */
    width:400px;
}

h2,
h3 {
    font-family: 'Segoe UI', sans-serif;
    font-size: 20px;
    font-weight: normal;
    color: rgb(240, 234, 210);
    text-shadow: 0px 0px 15px rgba(0, 0, 0);
}

/* Estilo para los contenedores info-item */
.info-item {
    display: flex;
    flex-direction: row; /* Alinear los elementos en una fila */
    justify-content: space-between; /* Espacio entre los elementos */
    align-items: center; /* Alinear verticalmente al centro */
    margin-bottom: 15px;
    padding: 15px; /* Espaciado interno */
}


.info-item h3 {
    font-size: 18px; /* Tamaño del encabezado */
    margin: 0; /* Sin margen */
    color: rgb(240, 234, 210); /* Color del encabezado */
}

.info-item p, #descrip {
    font-size: 18px; /* Tamaño del párrafo */
    color: rgb(240, 234, 210); /* Color del párrafo */
}

/* Botones dentro de info-item */
.btn,
.promotion-btn {
    text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2); /* Sombra del texto */
    border-radius: 5px; /* Bordes redondeados */
    border: none; /* Sin borde */
    font-family: 'Segoe UI', sans-serif; /* Fuente */
    font-size: 18px; /* Tamaño de fuente */
    padding: 10px 20px; /* Espaciado interno */
    backdrop-filter: blur(12px); /* Efecto de desenfoque */
    background-color: rgb(240, 234, 210); /* Color de fondo */
    color: rgb(55, 45, 39); /* Color del texto */
    cursor: pointer; /* Cambia el cursor */
    white-space: nowrap; /* Sin salto de línea */
}

button {
    background-color: rgba(0, 0, 0, 0);
    border: none;
}

.iconos {
    width: 30px;
    margin-right: 10px;
}

#contenedor_direccion {
    font-family: 'Segoe UI', sans-serif;
    padding: 20px;
    background-color: rgba(108, 88, 76, 0.8);
    color: rgb(55, 45, 39);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    margin: 20px auto;
    text-align: center;
}

#direccion {
    width: 95%;
    height: 150px;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    background-color: rgb(240, 234, 210);
    color: rgb(55, 45, 39);
    font-family: 'Segoe UI', sans-serif;
    margin-bottom: 20px;
    resize: none;
}

#btn_guardar {
    text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    border: none;
    font-family: 'Segoe UI', sans-serif;
    font-size: 18px;
    padding: 10px 20px;
    backdrop-filter: blur(12px);
    background-color: rgb(240, 234, 210);
    color: rgb(55, 45, 39);
    cursor: pointer;
    white-space: nowrap;
    transition: background-color 0.3s;
}

#btn_guardar:hover {
    background-color: rgb(75, 65, 59);
    color: white;
}


@media (max-width: 550px) {



    body{

        padding: 0px;
    }

    .container{
        width: 100%;

        max-width: 100%;
        border-radius: 0px;

        background-color: rgba(108, 88, 76, 0.5);
        backdrop-filter: blur(5px);
    }

    
    #contenedor_direccion{
        width: 100vh;
        max-width:110%;
        border-radius: 0px;
        background-color: rgba(108, 88, 76, 0.5);
        height: 350px;
        padding: 5px;
        backdrop-filter: blur(5px);
    }

    #direccion{

        width: 80%;


    }
}


</style>


</head>
<div class="container">

<div class="top-right">
    <a href="javascript:window.history.back();">
        <img class="iconos" src="icons/volverclaro.png" alt="Volver">
    </a>
</div>

<div class="info-item">
    <h3>Docuemnto:</h3>
    <p><?php echo consultar($id, 'usuarios', 'documento'); ?></p>
    <button onclick="editarDato(<?php echo $id; ?>, 'documento')">
        <img class="iconos" src="icons/Formulario.svg"" alt="Editar">
    </button>
</div>

<div class="info-item">
    <h3>Nombre:</h3>
    <p><?php echo consultar($id, 'usuarios', 'usuario'); ?></p>
    <button onclick="editarDato(<?php echo $id; ?>, 'usuario')">
        <img class="iconos" src="icons/Formulario.svg" alt="Editar">
    </button>
</div>

<div class="info-item">
    <h3>Correo:</h3>
    <p><?php echo consultar($id, 'usuarios', 'correo'); ?></p>
    <button onclick="editarDato(<?php echo $id; ?>, 'correo')">
        <img class="iconos" src="icons/Formulario.svg" alt="Editar">
    </button>
</div>

<div class="info-item">
    <h3>Edad:</h3>
    <p><?php echo consultar($id, 'usuarios', 'edad'); ?></p>
    <button onclick="editarDato(<?php echo $id; ?>)">
        <img class="iconos" src="icons/Formulario.svg" alt="Editar">
    </button>
</div>

<div class="info-item">
    <h3>Contraseña:</h3>
    <p>
        <?php echo consultar($id, 'usuarios', 'contrasena'); ?>
    </p>
    <button onclick="cambiarContrasena(<?php echo $id; ?>, 'contrasena')">
        <img class="iconos" src="icons//Formulario.svg" alt="Editar">
    </button>
</div>

<div class="info-item">
    <h3>Dirección:</h3><br>
</div>
<center>
    <p id="descrip" >
        


<?php echo consultar($id, 'usuarios', 'direccion'); ?>


</p>


 </center>
</div>


<div id="contenedor_direccion">
<h3>Actualizar Dirección</h3>
<form id="direccionForm" method="POST" action="actualizar_direccion.php">
    <textarea id="direccion" name="direccion" placeholder="Escriba aquí su dirección..." required></textarea>
    <button type="submit" id="btn_guardar" class="promotion-btn">Guardar Dirección</button>
</form>
</div>

</body>


<script>
    // Muestra el select para editar el rol
    function mostrarSelect(id) {
        document.getElementById('selectRolContainer').style.display = 'inline'; // Mostrar el select
        document.getElementById('selectRol').value = document.getElementById('rol').innerText; // Poner el valor actual como seleccionado
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

        function cambiarContrasena(id) {
    // Primero, pide la contraseña anterior
    const contrasenaAnterior = prompt("Introduce tu contraseña anterior:");
    
    fetch('verificar_contrasena.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${id}&contrasena=${encodeURIComponent(contrasenaAnterior)}`
    })
    .then(response => response.json()) // Espera una respuesta JSON
    .then(data => {
        if (data.status === 'success') {
            // La contraseña anterior es correcta, ahora pide la nueva contraseña
            const nuevaContrasena = prompt("Introduce la nueva contraseña:");
            const confirmarContrasena = prompt("Confirma la nueva contraseña:");
            
            if (nuevaContrasena === confirmarContrasena) {
                // Si las contraseñas coinciden, cambia la contraseña
                fetch('cambiar_contrasena.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${id}&nueva_contrasena=${encodeURIComponent(nuevaContrasena)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert("Contraseña actualizada exitosamente.");
                        location.reload();
                    } else {
                        alert("Error al actualizar la contraseña.");
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                alert("Las contraseñas no coinciden.");
            }
        } else {
            alert("La contraseña anterior es incorrecta.");
        }
    })
    .catch(error => console.error('Error:', error));
}


</script>

<script src="admin/animaciones.js"></script>
</html>