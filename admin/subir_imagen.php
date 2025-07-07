<?php
include 'funciones.php';
verificarSesion();
verificarsecionAdministrativa();

$id = $_POST['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>

    <style>
        /* Estilo para el body */
        body {
            font-family: Arial, sans-serif;
            background-image: url(../images/fondito.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor principal con flexbox para centrar el contenido */
        .container {
            display: grid; /* Usamos flexbox para distribuir los elementos */
            grid-template-columns: 350px auto ;
            gap: 20px; /* Espacio entre los contenedores */
            max-width: 1200px; /* Ancho máximo */
            width: 100%;
            justify-content: center; /* Centra los elementos en el eje principal */
            align-items: flex-start;
        }

        /* Estilo para el formulario */
        .upload-form {

            padding: 20px;

            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: rgba(108, 88, 76,0.8);
            backdrop-filter: blur(15px);
            color:rgb(240,234,210);
            font-family: Arial, sans-serif;
            flex: 1; /* Para que el formulario ocupe el espacio disponible */
        }

        .upload-form label {
            font-size: 20px;
            color:rgb(240,234,210);
            margin-bottom: 8px;
            display: block;
        }

        .upload-form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 12px;
            font-size: 14px;

            border-radius: 4px;

            color:rgb(240,234,210);
        }

        .upload-form button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: rgba(108, 88, 76,0.8);

            background-color: rgb(240,234,210);;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }



        /* Estilo para el contenedor de información */
        .info-container {

            grid-column: 1;

            padding: 20px;
            background-color: rgba(108, 88, 76,0.8);
            backdrop-filter: blur(15px);
            color:rgb(240,234,210);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;

            flex: 1; /* Asegura que el contenedor tenga el mismo tamaño que el formulario */
        }

        .info-container h2 {
            font-size: 24px;
            margin-bottom: 16px;
            color:rgb(240,234,210);
        }

        .info-container p {
            font-size: 16px;
            line-height: 1.6;
            color:rgb(240,234,210);
        }

        .anterior{
            background-color: rgba(108, 88, 76,0.8);
            backdrop-filter: blur(15px);
            border-radius: 5px;

            flex-wrap: wrap;
            
            grid-column: 2;
            grid-row: 1/3;


        }


        .anterior img{

            width: 290px;
            height: 100%;
            border-radius: 10px;
            margin-right: 20px;

        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Formulario de subida de imagen -->
        <form action="subir_imagen_logica.php" method="post" enctype="multipart/form-data" class="upload-form">
            <input type="hidden" name="form_id" value="upload_image"> <!-- Campo oculto -->
            <label for="imagen">Selecciona una imagen:</label>
            <input type="file" name="imagen" id="imagen" required>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit">Subir Imagen</button>
        </form>


        

        <!-- Contenedor con información adicional -->
        <div class="info-container">
            <h2>Instrucciones</h2>
            <p>Por favor, selecciona una imagen para subir. Asegúrate de que el archivo esté en formato JPG, PNG o GIF y que no exceda los 5MB.</p>
            <p>Una vez que subas la imagen, será procesada y almacenada en el sistema.</p>
        </div>

        <div class="anterior">

        <?php
                $ruta=consultar($id,"producto","imagen");


                if(empty($ruta)){           
            ?>

                    <img  src="../icons/simagen2.svg" alt="Imagen del producto: Malation">



            <?php 
            }else{          
            ?>
                
            <img src="./<?php echo consultar($id,"producto","imagen"); ?>" alt="Imagen del producto: Malation">

            <?php 
            }
                
            ?>


        </div>
    </div>

    <script src="animaciones.js"></script>

</body>
</html>
