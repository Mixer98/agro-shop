<?php
require 'funciones.php'; // Incluir tus funciones personalizadas

// Capturar datos del formulario
$descuento  = $_POST['descuento'];
$idProducto = $_POST['id']; 
$mensaje    = $_POST['mensaje']; 

// Obtener el precio original
$precio = consultar($idProducto, 'producto', 'precio');

// Aplicar el descuento
$descuentoaplicado = aplicarDescuento($precio, $descuento);
cambiar($idProducto, 'producto', 'precio_con_descuento', $descuentoaplicado);
cambiar($idProducto, 'producto', 'descuento', $descuento);

// Crear el mensaje de promoción
if ($descuento > 0) {
    $nombre = consultar($idProducto, 'producto', 'nombre');
    $mensajeFinal = 'Hasta un ' . $descuento . '% de descuento con ' . $nombre . ' ' . $mensaje;
} else {
    $mensajeFinal = $mensaje; // Si no hay descuento, se omite la parte del % de descuento
}

// Conexión
$conexion = conectar();

// Verificar si ya existe una promoción para este producto
$sql_check = "SELECT id FROM promocion WHERE id_producto = $idProducto";
$resultado = mysqli_query($conexion, $sql_check);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Si ya existe, actualiza
    $sql_update = "UPDATE promocion SET promocion = ? WHERE id_producto = ?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("si", $mensajeFinal, $idProducto);
} else {
    // Si no existe, inserta nueva
    $sql_insert = "INSERT INTO promocion (id_producto, promocion) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql_insert);
    $stmt->bind_param("is", $idProducto, $mensajeFinal);
}

// Ejecutar la consulta
if ($stmt->execute()) {
    header("Location: adminindex.php");
    exit();
} else {
    echo "Error al guardar o actualizar la promoción: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
