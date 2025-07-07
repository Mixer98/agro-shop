

<?php

require 'funciones.php';
verificarSesion();
verificarsecionAdministrativa();

?>



<!DOCTYPE html>
<html lang="es">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>

    <link rel="stylesheet" href="barras.css">
    <title>Sesion Administrativa</title>
    <header>
        <div id="logo-titulo">
            <img id="logo" src="../icons/Formulario.svg" alt="">
            <h1>Formulario</h1>
        </div>
    </header>



  <style>



        .contenido{
            grid-column: 2/5;
            grid-row: 3/5;


            display: flex;
            justify-content: center;
        }
        /* Estilo para el contenedor del formulario */
        #form-container {

            
            display: grid;
            grid-template-columns: repeat(2,50%) ;/* Dos columnas de igual ancho */
            grid-template-rows:  repeat(13,40px);
            gap: 10px;
            padding: 20px; 
            background-color: rgba(240, 234, 210, 0.5); /* Fondo semi-transparente */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5); /* Sombra del contenedor */
            margin-top: 20px;
            backdrop-filter: blur(15px);
            width: 500px;

        }

        /* Estilo para el título del formulario */
        #form-container h1 {
            font-family: 'Segoe UI', sans-serif;
            font-size: 30px; /* Tamaño del título */
            font-weight: bold;
            color: rgb(108, 88, 76); /* Color del texto */
            text-align: center; /* Centrar el texto */
            margin-bottom: 20px; /* Margen inferior */
            margin-left: 270px;
            white-space: nowrap;
            text-shadow: none;
        }

        /* Estilo para las etiquetas */
        #form-container label {
            font-family: 'Segoe UI', sans-serif;
            font-size: 20px; /* Tamaño de la etiqueta */
            color: rgb(108, 88, 76); /* Color de las etiquetas */
        }

        /* Estilo para los campos de entrada */

       
        #form-container select {
            width: 98%; /* Ancho completo de la celda */
            height: 80%; /* Altura de los inputs */
            margin: 5px; /* Margen vertical */
            padding: 5px; /* Espaciado interno */
            border: 1px solid rgb(108, 88, 76,0); /* Borde del input */
            border-radius: 5px; /* Bordes redondeados */
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px; /* Tamaño del texto */
            background-color: rgb(108, 88, 76); /* Color de fondo */
            transition: background-color 0.3s, border-color 0.3s; /* Transición suave */
            text-align: center;
            color: rgba(240,234,210);
        }

        #form-container textarea,
        #form-container input{
            width: 95%; /* Ancho completo de la celda */
            height: 80%; /* Altura de los inputs */
            margin: 5px; /* Margen vertical */
            padding: 5px; /* Espaciado interno */
            border: 1px solid rgb(108, 88, 76); /* Borde del input */
            border-radius: 5px; /* Bordes redondeados */
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px; /* Tamaño del texto */
            background-color: rgb(108, 88, 76); /* Color de fondo */
            transition: background-color 0.3s, border-color 0.3s; /* Transición suave */
            text-align: center;
            color: rgb(240,234,210);
        }




        /* Efecto hover para inputs y selects */
        #form-container input:hover,
        #form-container select:hover,
        #form-container textarea:hover {
            background-color: rgba(240,234,210); /* Color de fondo en hover */
            border-color: rgb(108, 88, 76); /* Color del borde en hover */
            color: rgb(108, 88, 76);
        }

        /* Estilo para el botón de envío */
        #form-container input[type="submit"] {
            grid-column: span 2; /* El botón ocupa ambas columnas */
            background-color: rgb(108, 88, 76); /* Color de fondo del botón */
            color: rgb(240,234,210);
            border: none; /* Sin borde */
            cursor: pointer; /* Cambia el cursor a mano */
            height: 40px; /* Altura del botón */
            margin-top: 10px; /* Margen superior */
            transition: background-color 0.3s, color 0.3s; /* Transición suave */

        }

        #form-container textarea{
            grid-column: span 2;
        }




  </style>

</head>
<body>      
    



        <div id="barras">
            <div id="barrabusqueda">          
                        <input class="inputbuscar" type="text">
                        <button class="botonbuscar" ><img style="margin-top: 3px;" class="icon" src="../icons/Search.png" alt=""></button>
            </div>
    
            <nav>  
                <a href="adminindex.php"><img  style="margin-top: 4px;" class="icon" src="../icons/homecafe.png" alt=""></a>
                <a href="usuarios.php">Usuarios</a>
                <a href="pedidos.html">Pedidos</a>
                <a href="inventario.php">Inventario</a>
                <a href="formularproduct.html">Formular</a>
    
            </nav>
    
            <div id="barrapersonal" >
    
                <a href=""><img class="icon" src="../icons/Notify.png" alt=""></a>
                <a href="../cerrar.php"><img class="icon"  src="../icons/User.png" alt=""></a> 
            </div>
        </div>


        <div class="contenido">


        <form id="form-container" action="formularproduct.php" method="post">

            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" required>
    
            <label for="marca">Proveedor:</label>
            <input type="text" id="marca" name="marca" required>
    
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" onchange="cambiarSubcategoria()" required>
                <option value="" selected disabled>Selecciona una categoría</option>
                <option value="semillas">Semillas</option>
                <option value="alimento">Alimento</option>
                <option value="insecticida">Insecticida</option>
                <option value="medicina">Medicina</option>
                <option value="fertilizante">Fertilizante</option>
                <option value="animales">Animales</option>
            </select>
    
            <label for="subcategoria">Subcategoría:</label>
            <select name="subtipo" id="subcategoria" required>
                <option value="" selected disabled>Selecciona una subcategoría</option>
            </select>
    
            <label for="medida">Medida:</label>
            <input type="number" id="medida" name="medida" step="0.01" required>
    
            <label for="tipo_medida">Unidad de Medida:</label>
            <select name="unidad_medida" id="tipo_medida" required>
                <option value="" selected disabled>Selecciona un tipo de medida</option>
                <option value="Gramos">Gramos</option>
                <option value="kilogramos">Kilogramos</option>
                <option value="mililitros">Mililitros</option>
                <option value="miligramos">Miligramos</option>
                <option value="litros">Litros</option>
                <option value="libras">Libras</option>
            </select>
    
            <label for="unidades_disponibles">Unidades A Almacenar:</label>
            <input type="number" id="unidades_disponibles" name="unidades_disponibles" required>
    
            <label for="precio">Precio De la Unidad:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>


            <label for="lugar_almacenamiento">Lugar de Almacenamiento:</label>
            <select id="lugar_almacenamiento" name="lugar_almacenamiento" required>
                <option value="" selected disabled>Seleccione una opción</option>
                <option value="Finca #1">Finca #1</option>
                <option value="Finca #2">Finca #2</option>
                <option value="Finca #3">Finca #3</option>
                <option value="Finca #4">Finca #4</option>
            </select>

    
            <label for="tipo_almacenamiento">Tipo De Almacenamiento:</label>

            <select name="tipo_almacenamiento" id="tipo_almacenamiento" required>
                <option value="" selected disabled>Tipo De Almacenamiento</option>
                <option value="Lugar Seco">Lugar Seco</option>
                <option value="Clima Controlado">Clima Contorlado</option>
                <option value="Refrigerado">Refrigerado</option>
                <option value="Seguro Y Aislado">Seguro Y Aislado</option>
                <option value="Lugar Ventilado">Lugar Ventilado</option>
                <option value="Corral Animal">Corral Animal</option>
            </select>

            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>


    
            <input type="submit" value="Agregar Producto">

  
        


</form></div>
    


</body>

<script>
        // Objeto que contiene las subcategorías para cada categoría
        const subcategorias = {
            semillas: ["Vegetales", "Frutas", "Hierbas", "Flores", "Cereales Y Granos", "Arbustos Y Arboles"],
            alimento: ["Seco", "Húmedo", "Frescos", "Suplementos", "Concentrados"],
            insecticida: ["Polvos","Liquido","Naturalez", "Químico", "Instantáneo", "Sistemático"],
            medicina: ["Analgesico","Vacunas", "Antibióticos", "Antiinflamatorios", "Antiparasitarios", "Vitaminas"],
            fertilizante: ["Orgánico", "Químico", "Líquido"],
            animales: ["Mamíferos", "Aves", "Reptiles", "Peces"],
        };

        // Función para cambiar las subcategorías según la categoría seleccionada
        function cambiarSubcategoria() {
            const categoria = document.getElementById("categoria").value;
            const subcategoriaSelect = document.getElementById("subcategoria");

            // Limpia las subcategorías actuales
            subcategoriaSelect.innerHTML = '<option value="" selected disabled>Selecciona una subcategoría</option>';

            // Si la categoría tiene subcategorías, las agrega al menú de subcategorías
            if (subcategorias[categoria]) {
                subcategorias[categoria].forEach(subcategoria => {
                    const option = document.createElement("option");
                    option.value = subcategoria.toLowerCase().replace(/\s+/g, '_'); // Reemplaza espacios por guiones bajos en el valor
                    option.textContent = subcategoria;
                    subcategoriaSelect.appendChild(option);
                });
            }
        }

 
</script>
</html>