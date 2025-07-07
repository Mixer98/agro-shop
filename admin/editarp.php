
<?php 

require "funciones.php";

session_start();


verificarsecionAdministrativa();




   


    
    $idp = $_POST['id'];
    $id = $_POST['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

body {
    font-family: Arial, sans-serif;
    background-image: url('../images/fondito3.jpg');
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
    padding: 20px;
}

/* Contenedor principal */
.container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
    max-width: 800px;
    margin: auto;
   
    border-radius: 10px;

    width: 95%;
}

/* Detalles del producto */
.product-details {
    padding: 20px;
    background-color: rgba(240, 234, 210, 0.7);
    color: rgb(55, 45, 39);
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(240, 234, 210, 0.3);
    font-family: 'Segoe UI', sans-serif;
    transition: background-color 0.3s ease, color 0.3s ease;
    backdrop-filter: blur(15px);
}

    .product-details h1 {
        font-size: 20px;
        font-weight: bold;

        color: rgb(55, 45, 39);


    }

.product-details label, .product-details p {
    font-size: 20px;
    color: rgb(55, 45, 39);

    display: flex;
        align-items: center;
        justify-content: space-between;
}

/* Iconos dentro de los detalles del producto */
.product-details div img {
    width: 30px;
}

/* Sección del formulario */
.form-section {
    display: none;

    gap: 10px;
    padding: 20px;
    border-radius: 5px;
    background-color: rgba(240, 234, 210, 0.9);
    color: rgb(55, 45, 39);
    backdrop-filter: blur(15px);
}

/* Elementos dentro de la sección del formulario */
.form-section div {
    display: none;

 /* Asegúrate de que el contenedor sea un flexbox */
    flex-direction: column; /* Cambia la dirección de los elementos a columna */
    flex: 1 1 48%;
    min-width: 150px;

}

label {
    font-size: 20px;
    margin-bottom: 6px;
    color: rgb(55, 45, 39);
    display: block;
    font-family: 'Segoe UI';
  
    align-self: center; /* Centra este elemento verticalmente */
}


 #icon{

    width: 20px;
 }

 .product-details button{
    display: flex;

    background-color: rgb(0, 0, 0,0);

    border: 1px solid rgb(0,0,0,0);

    border-radius: 5px;

    padding: 3px;
    align-items: center;
 }


 .product-details button:hover{
   

    border: 1px solid rgb(55, 45, 39);

}


 input[type="text"], 
input[type="number"], 
select, 
textarea {
    width: 100%;
    height: 35px;
    padding: 6px;
    font-size: 20px;
    margin-top: 2px;
    margin-bottom: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    color: rgb(55, 45, 39);
    backdrop-filter: blur(12px);
    border: 1px solid transparent;
    background-color: rgb(108, 88, 76); 
    color: rgb(240, 234, 210);   


    
}
input[type="text"]:hover , input[type= "number"]:hover, select:hover {

border-color: rgb(240, 234, 210); 

background-color: rgba(240, 234, 210, 0.9); /* Color de fondo uniforme */
color: rgb(55, 45, 39);   

border: 1px solid rgb(55, 45, 39);

}

textarea{
    resize: none;

    height: 150px;



}

.botonactualizar{

    text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    border: none;
    font-family: 'Segoe UI', sans-serif;
    font-size: 18px;
    padding: 10px 20px;
    backdrop-filter: blur(12px);
    background-color:  rgb(55, 45, 39);
    color:rgb(240, 234, 210) ;
    cursor: pointer;
    white-space: nowrap;

    transition: background-color 0.3s;
    margin-top: 20px;
}
.h1-container {
    display: flex;                /* Utiliza flexbox para alinear los elementos */
    justify-content: space-between; /* Espacio entre los elementos */
    align-items: center;         /* Centra verticalmente los elementos */
}


.product-brand, 
.product-category, 
.product-subcategory, 
.product-measure, 
.product-units, 
.product-price, 
.product-storage-type, 
.product-storage-location {
    display: flex;                  /* Utiliza flexbox para alinear los elementos */
    justify-content: space-between; /* Espacio entre los elementos */
    align-items: center;           /* Centra verticalmente los elementos */

    margin-bottom: 20px;
}

.left-content {
    flex: 1;                       /* Deja que este elemento ocupe el espacio necesario */
    text-align: left;             /* Alinea el texto a la izquierda */
}

.center-content {
    flex: 2;                       /* Este elemento ocupa más espacio que los otros */
    text-align: center;            /* Centra el contenido */
}

.right-content {
    flex: 0;                       /* Este elemento no ocupa espacio adicional */
    text-align: right;             /* Alinea el botón a la derecha */
}




    </style>


    <title><?php echo consultar($idp,"producto","nombre"); ?></title>

    


</head>
<body>
<div class="container">




<div class="product-details">


<a href="inventario.php" class="back-link">
    <img id="icon" src="../icons/volvecafe.svg" alt="Volver" class="back-icon">
</a>
    <div class="h1-container">
        <h1 class="left-content">Nombre:</h1>
        
        <label class="center-content">
            <?php echo consultar($id,"producto","nombre"); ?></label>

        <button class="config-btn right-content" onclick="mostrarFormulario('editarnombre')">
            <img id="icon" src="../icons/editar.svg" alt="">
        </button>
    </div>

    <div id="editarmarcaclik" class="product-brand">
    <h1 class="left-content">Marca:</h1>
    
    <label class="center-content">
        <?php echo consultar($id, "producto", "marca"); ?></label>

    <button class="config-btn right-content" onclick="mostrarFormulario('editarmarca')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-category">
    <h1 class="left-content">Categoría:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "categoria"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editar-categoria')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-subcategory">
    <h1 class="left-content">SubCategoría:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "subtipo"); ?></label>
</div>

<div class="product-measure">
    <h1 class="left-content">Medida:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "medida"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editarmedida')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-measure">
    <h1 class="left-content">Unidad de Medida:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "unidad_medida"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editarmedia')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-units">
    <h1 class="left-content">Unidades Disponibles:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "unidades_disponibles"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editarunidades')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-price">
    <h1 class="left-content">Precio:</h1>
    <label class="center-content">$<?php 
    
    
    
    echo number_format(consultar($id, "producto", "precio"), 2, '.', ','); 
    
    
    
    ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editarprecio')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-storage-type">
    <h1 class="left-content">Tipo de Almacenamiento:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "tipo_almacenamiento"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editartipodealmace')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<div class="product-storage-location">
    <h1 class="left-content">Almacenado En:</h1>
    <label class="center-content"><?php echo consultar($id, "producto", "lugar_almacenamiento"); ?></label>
    <button class="config-btn right-content" onclick="mostrarFormulario('editarlugar')">
        <img id="icon" src="../icons/editar.svg" alt="">
    </button>
</div>

<p class="product-description">
        Descripción: <?php echo consultar($id,"producto","Descripcion"); ?>
        <button class="config-btn" onclick="mostrarFormulario('editardescrip')"><img id="icon" src="../icons/editar.svg" alt=""></button>
    </p>



 </div>





<div class="form-section">

    <div id="editarnombre" >
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'nombre')">Actualizar</button>
    </div>
    
    <div id="editarmarca">
        <label for="marca">Proveedor:</label>
        <input type="text" id="marca" name="marca" required>
        <button class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'marca')">Actualizar</button>
    </div>

    <div id="editar-categoria">
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
    <button class = "botonactualizar" onclick="captura2('<?php echo $idp; ?>', 'categoria', document.getElementById('categoria').value, 'subtipo', document.getElementById('subcategoria').value)">Actualizar</button>

    </div>

   

    <div id="editarmedida"> 
    <label for="medida">Medida:</label>
    <input type="number" id="medida" name="medida" step="0.01" required>
    <button class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'medida')">Actualizar</button>
    </div>


    <div id="editarmedia">
        <label for="tipo_medida">Unidad de Medida:</label>
        <select name="unidad_medida" id="unidad_medida" required>
            <option value="" selected disabled>Selecciona un tipo de medida</option>
                <option value="Gramos">Gramos</option>
                <option value="kilogramos">Kilogramos</option>
                <option value="mililitros">Mililitros</option>
                <option value="miligramos">Miligramos</option>
                <option value="litros">Litros</option>
                <option value="libras">Libras</option>
        </select>
        <button  class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'unidad_medida')">Actualizar</button>
    </div>

    <div id="editarunidades">
        <label for="unidades_disponibles">Unidades A Almacenar:</label>
        <input type="number" id="unidades_disponibles" name="unidades_disponibles" required>
        <button  class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'unidades_disponibles')">Actualizar</button>
    </div>

    <div id="editarprecio">
        <label for="precio">Precio De la Unidad:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        <button class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'precio')">Actualizar</button>
    </div>

    <div id="editarlugar">
        <label for="lugar_almacenamiento">Lugar de Almacenamiento:</label>
        <select id="lugar_almacenamiento" name="lugar_almacenamiento" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="Finca #1">Finca #1</option>
            <option value="Finca #2">Finca #2</option>
            <option value="Finca #3">Finca #3</option>
            <option value="Finca #4">Finca #4</option>
        </select>
        <button class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'lugar_almacenamiento')">Actualizar</button>
    </div>

    <div id="editartipodealmace">
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
        <button  class = "botonactualizar" onclick="captura('<?php echo $idp; ?>', 'tipo_almacenamiento')">Actualizar</button>
    </div>

    <div id="editardescrip">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <button class = "botonactualizar"  onclick="captura('<?php echo $idp; ?>','descripcion')">Actualizar</button>
    </div>
</div>

<script>


function captura2(id, columna1, cambioColumna1, columna2, cambioColumna2) {
    // Crear un objeto FormData para enviar los datos de forma sencilla
    const datos = new FormData();
    datos.append('id', id);
    datos.append('columna1', columna1);
    datos.append('cambioColumna1', cambioColumna1);
    datos.append('columna2', columna2);
    datos.append('cambioColumna2', cambioColumna2);

    // Enviar los datos mediante fetch al archivo PHP
    fetch('editarlogica.php', {
        method: 'POST',
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        // Aquí puedes manejar la respuesta del servidor
        console.log("Respuesta del servidor:", data);
        alert("Datos actualizados correctamente");
        window.location.reload(); // R
    })
    .catch(error => {
        console.error("Hubo un error en la solicitud:", error);
        alert("Ocurrió un error al actualizar los datos");
    });
}


    function captura(id, columna) {
    const inputElement = document.getElementById(columna);

    // Verificar si el elemento existe
    if (!inputElement) {
        alert(`No se encontró el elemento con ID: ${columna}`);
        return; // Salir de la función si no se encuentra el elemento
    }

    const cambio = inputElement.value;

    // Crear un objeto FormData para enviar los datos
    const formData = new FormData();
    formData.append('id', id);
    formData.append('columna', columna);
    formData.append('cambio', cambio);

    // Usar fetch para enviar los datos con el método POST
    fetch('editarlogica.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        window.location.reload(); // Recargar la página
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


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
       
        // Selecciona la sección de formularios
        const formSection = document.querySelector('.form-section');

        // Función para mostrar un formulario específico y ocultar los demás
        function mostrarFormulario(formId) {
    // Asegura que `formSection` esté visible
    formSection.style.display = "flex";
    
    // Oculta todos los hijos de `formSection`
    Array.from(formSection.children).forEach(child => {
        child.style.display = "none";
    });
    
    // Muestra solo el formulario correspondiente
    const formulario = document.getElementById(formId);
    if (formulario) {
        formulario.style.display = "flex";
    }

    // Desplaza la ventana hacia la parte inferior
    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: 'smooth' // Opcional: hace que el scroll sea suave
    });
}






</script>




</body>
</html>