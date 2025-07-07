<?php
session_start(); // Inicia la sesión

require 'admin/funciones.php'; // Incluye las funciones de conexión

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo "<script>alert('Por favor, inicia sesión primero.'); location.href = 'login.php';</script>";
    exit();
}

// Recupera la ID del usuario en sesión y la ID del producto desde la solicitud POST
$conexion = conectar();
$usuario_id = mysqli_real_escape_string($conexion, $_SESSION['id_usuario']);
$producto_id = mysqli_real_escape_string($conexion, $_POST['id_producto']);
$cantidad = mysqli_real_escape_string($conexion, $_POST['cantidad']);

// Validar que la cantidad es un número y mayor que cero
if (!is_numeric($cantidad) || $cantidad <= 0) {
    echo "<script>alert('Cantidad no válida.'); location.href = 'producto.php?id=$producto_id';</script>";
    exit();
}

// Verifica si el usuario existe
$checkUsuario = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultadoUsuario = mysqli_query($conexion, $checkUsuario);

if (mysqli_num_rows($resultadoUsuario) == 0) {
    echo "<script>alert('Usuario no encontrado.'); location.href = 'login.php';</script>";
    exit();
}

// Verifica si el producto existe
$checkProductoExistente = "SELECT * FROM producto WHERE id = '$producto_id'";
$resultadoProductoExistente = mysqli_query($conexion, $checkProductoExistente);

if (mysqli_num_rows($resultadoProductoExistente) == 0) {
    echo "<script>alert('Producto no encontrado.'); location.href = 'producto.php?id=$producto_id';</script>";
    exit();
}

// Comprobar si el producto ya está en el carrito
$checkProducto = "SELECT * FROM carrito WHERE usuario_id = '$usuario_id' AND producto_id = '$producto_id'";
$resultadoCheck = mysqli_query($conexion, $checkProducto);

if (mysqli_num_rows($resultadoCheck) > 0) {
    // Actualiza la cantidad del producto si ya existe en el carrito
    $updateCantidad = "UPDATE carrito SET cantidad = cantidad + $cantidad WHERE usuario_id = '$usuario_id' AND producto_id = '$producto_id'";
    $queryUpdate = mysqli_query($conexion, $updateCantidad);

    if ($queryUpdate) {
        echo "<script>alert('Cantidad actualizada en el carrito.');</script>";
    } else {
        die('ERROR: No se pudo actualizar la cantidad del producto: ' . mysqli_error($conexion));
    }
} else {
    // Si el producto no está en el carrito, agrégalo como una nueva entrada con la cantidad especificada
    $insertarProducto = "INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES ('$usuario_id', '$producto_id', $cantidad)";
    $queryInsert = mysqli_query($conexion, $insertarProducto);

    if ($queryInsert) {
        echo "<script>alert('Producto agregado al carrito con éxito.');</script>";
    } else {
        die('ERROR: No se pudo agregar el producto al carrito: ' . mysqli_error($conexion));
    }
}

// Cerrar la conexión
mysqli_close($conexion);

// Redirigir a la página anterior después de un pequeño retraso
echo "<script>setTimeout(function() { window.history.back(); }, 1000);</script>";
?>
