<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>usuario</th>
                    <th>correo</th>
                    <th>sexo</th>
                    <th>fecha</th>
                    <th>contrasena</th>
                    <th>departamento</th>
                    <th>municipio</th>
                </tr>

            </thead>

            <tbody>


            
            <?php 
            require 'conexion.php';

            $sql ="SELECT * FROM usuarios";
            $resultado = $conectar ->query($sql);

            while ($mostrar = $resultado->fetch_assoc()) {

                ?>
            <tr>
                <td><?php echo $mostrar['documento']; ?></td>
                <td><?php echo $mostrar['usuario']; ?></td>
                <td><?php echo $mostrar['correo']; ?></td>
                <td><?php echo $mostrar['sexo']; ?></td>
                <td><?php echo $mostrar['fecha']; ?></td>
                <td><?php echo $mostrar['contrasena']; ?></td>
                <td><?php echo $mostrar['departamento']; ?></td>
                <td><?php echo $mostrar['municipio']; ?></td>
                
            <?php
            }
            ?>
            </tr>
        </tbody>
        </table>
        
    </div>
</body>
</html>