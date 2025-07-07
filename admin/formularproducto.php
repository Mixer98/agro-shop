<?php 
    require_once('funciones.php');


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




    #form-container {

        grid-column: 2/5;
        grid-row: 3/5;

        display: grid;
        grid-template-columns: repeat(3,1fr); /* Una sola columna para cada fila */
        gap: 15px; /* Espacio entre filas */
        padding: 20px;
        margin: 50px;
        background-color: rgba(240, 234, 210);
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);

    }

.form-group{

        display: flex;
}



/* Coloca la etiqueta y el campo de entrada en la misma línea */
 form-group, form-groupd {
    display: flex;
    align-items: center;
    gap: 10px;
}


form-groupd{
    grid-column: span 2;
}

/* Ajuste de etiquetas e inputs */
#form-container label {
 
    font-family: 'Segoe UI', sans-serif;
    font-size: 18px;
    color: rgb(108, 88, 76);
    width: 170px;
    text-align: left;



}

#form-container input,
#form-container select,
#form-container textarea {
    flex: 1; /* Ocupa el espacio restante en la fila */

    padding: 5px;
    border: 1px solid rgb(108, 88, 76);
    border-radius: 5px;
    font-family: 'Segoe UI', sans-serif;
    font-size: 16px;
    background-color: rgb(108, 88, 76);
    color: rgb(240, 234, 210);
    height: 40px;
}




/* Ajuste específico para el área de texto */
#form-container textarea {
    height: 90%; /* Mayor altura para textarea */
    resize: none; /* Permitir redimensionar verticalmente */
    color: rgb(240, 234, 210);
    text-align: left;
    
}


#form-container textarea::placeholder {
    color: rgb(240, 234, 210); /* Cambia este color a lo que prefieras */
    opacity: 1; /* Asegura que el color sea consistente en todos los navegadores */
}



#form-container input[type="submit"]:hover {
    background-color: rgb(88, 68, 56); /* Color en hover */
}

#descripcion{

    grid-column: span 2;
}


#botonformu{
    background-color: rgb(108, 88, 76);
    color: rgb(240, 234, 210);
    border: none;
    cursor: pointer;
    width: 150px;
    height: 40px;
    margin-top: 10px;
    transition: background-color 0.3s, color 0.3s;

    flex-basis: 100%; /* Hace que el botón ocupe el ancho completo de la línea */
    margin-top: 10px; 

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
                <a href="pedidos.php">Pedidos</a>
                <a href="inventario.php">Inventario</a>
                <a href="formularproducto.php">Formular</a>
    
            </nav>
    
            <div id="barrapersonal" >
    
                <a href=""><img class="icon" src="../icons/Notify.png" alt=""></a>
                <a href="../cerrar.php"><img class="icon"  src="../icons/User.png" alt=""></a> 
            </div>
        </div>


<div>
    
<form  id="form-container" action="formularproduct.php" method="post">

    <div class="form-group">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>


    <div class="form-group">
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
    </div>

    <div class="form-group">
        <label for="subcategoria">Subcategoría:</label>
        <select name="subtipo" id="subcategoria" required>
            <option value="" selected disabled>Selecciona una subcategoría</option>
        </select>
    </div>

   
    <div class="form-group">
        <label for="precio">Precio De la Unidad:</label>
        <input
            style="font-size: 20px;"
        
        type="text" id="precio" name="precio" required oninput="formatearNumero(this)" />
    </div>


    <div class="form-group">
        <label for="medida">Medida:</label>
        <input type="number" id="medida" name="medida" step="0.01" required>
    </div>

    <div class="form-group">
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
    </div>

    <div class="form-group">
        <label for="unidades_disponibles">Unidades A Almacenar:</label>
        <input type="number" id="unidades_disponibles" name="unidades_disponibles" required>
    </div>



    <div class="form-group">
        <label for="lugar_almacenamiento">Lugar de Almacenamiento:</label>
        <select id="lugar_almacenamiento" name="lugar_almacenamiento" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="Finca #1">Finca #1</option>
            <option value="Finca #2">Finca #2</option>
            <option value="Finca #3">Finca #3</option>
            <option value="Finca #4">Finca #4</option>
        </select>
        
    </div>

    <div class="form-group">
        <label for="tipo_almacenamiento">Tipo De Almacenamiento:</label>
        <select name="tipo_almacenamiento" id="tipo_almacenamiento" required>
            <option value="" selected disabled>Tipo De Almacenamiento</option>
            <option value="Lugar Seco">Lugar Seco</option>
            <option value="Clima Controlado">Clima Controlado</option>
            <option value="Refrigerado">Refrigerado</option>
            <option value="Seguro Y Aislado">Seguro Y Aislado</option>
            <option value="Lugar Ventilado">Lugar Ventilado</option>
            <option value="Corral Animal">Corral Animal</option>
            
        </select>       
   </div>

   <div id="descripcion" class="form-group">

    <textarea  id="descripcion" placeholder="Descripcion del Producto..." name="descripcion" required></textarea> 
    </div>
   


   <div class="form-group" style=" display: flex;
    flex-wrap: wrap; 
    gap: 0px;">

  
        <label for="marca">Proveedor:</label>
        <input type="text" id="marca" name="marca" required>
    
        <input id="botonformu" type="submit" value="Agregar Producto">
    


    </div>


  


   

</form>

    
</div>


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

<script>
function formatearNumero(input) {
    // Obtener el valor ingresado y eliminar cualquier cosa que no sea un número o una coma.
    let valor = input.value.replace(/\D/g, '');
    
    // Formatear el número con separadores de miles
    let formateado = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    
    // Establecer el valor con los puntos como separadores
    input.value = formateado;
}
</script>

<script src="animaciones.js"></script>
</html>