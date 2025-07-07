<?php 

include 'admin/funciones.php';

    verificarSesion();
    verificarsecionEstandar();

    $id =$_SESSION['id_usuario'];

?>

<a href="index.php">Volver</a>

<div>
    <h3><?php echo consultar($id, 'usuarios','id');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'id')">Editar</button>

    <h3><?php echo consultar($id, 'usuarios','usuario');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'usuario')">Editar</button>

    <h3><?php echo consultar($id, 'usuarios','correo');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'correo')">Editar</button>

    <h3><?php echo consultar($id, 'usuarios','sexo');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'sexo')">Editar</button>

    <h3><?php echo consultar($id, 'usuarios','edad');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'edad')">Editar</button>


    <h3><?php echo consultar($id, 'usuarios','contrasena');?></h3>
    <button onclick="editarDato(<?php echo $id; ?>, 'contrasena')">Editar</button>

</div>




</body>



<script>
function editarDato(id, columna) {
            const nuevoValor = prompt(`Introduce el nuevo valor para ${columna}:`);
            if (nuevoValor !== null) {
                fetch('editarU.php', {
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
