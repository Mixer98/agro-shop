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
                    <th>documento</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>unidad</th>
                    <th>categoria</th>
                    <th>fecha de registro</th>
                    <th>fecha de vencimiento</th>
                    
                </tr>

            </thead>

            <tbody>


            
            <?php 
            require 'conexion.php';

            $sql ="SELECT * FROM productos";
            $resultado = $conectar ->query($sql);

            while ($mostrar = $resultado->fetch_assoc()) {

                ?>
            <tr>
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['precio']; ?></td>
                <td><?php echo $mostrar['cantidad']; ?></td>
                <td><?php echo $mostrar['unidad']; ?></td>
                <td><?php echo $mostrar['categoria']; ?></td>
                <td><?php echo $mostrar['fecha']; ?></td>
                <td><?php echo $mostrar['fechav']; ?></td>
               
                
            <?php
            }
            ?>
            </tr>
        </tbody>
        </table>
        
    </div>
</body>
</html>