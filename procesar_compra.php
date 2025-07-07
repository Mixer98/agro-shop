<?php  
session_start();
require 'admin/funciones.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    echo "<script>alert('Debe iniciar sesión para realizar una compra.'); window.location.href = 'login.php';</script>";
    exit();
}

// Conectar a la base de datos
$conexion = conectar();
$usuario_id = $_SESSION['id_usuario'];
$total = $_POST['total'];

// 1. Validar el stock de cada producto en el carrito
$queryCarrito = "
    SELECT carrito.id AS carrito_id, producto.id AS producto_id, producto.unidades_disponibles, carrito.cantidad 
    FROM carrito
    INNER JOIN producto ON carrito.producto_id = producto.id
    WHERE carrito.usuario_id = '$usuario_id'
";
$resultadoCarrito = mysqli_query($conexion, $queryCarrito);

$productosInsuficientes = [];
while ($item = mysqli_fetch_assoc($resultadoCarrito)) {
    if ($item['cantidad'] > $item['unidades_disponibles']) {
        $productosInsuficientes[] = $item['producto_id'];
    }
}

// Verificar si hay stock insuficiente
if (!empty($productosInsuficientes)) {
    echo "<script>alert('Algunos productos no tienen stock suficiente. Por favor, ajusta tu carrito.'); window.location.href = 'carrito.php';</script>";
    exit();
}

// 2. Crear el pedido en la base de datos
$queryPedido = "INSERT INTO pedidos (usuario_id, total, fecha) VALUES ('$usuario_id', '$total', NOW())";
mysqli_query($conexion, $queryPedido);
$pedido_id = mysqli_insert_id($conexion); // ID del pedido recién creado

// 3. Agregar cada producto del carrito al detalle del pedido y restar stock
mysqli_data_seek($resultadoCarrito, 0); // Reiniciar el puntero del resultado del carrito
while ($item = mysqli_fetch_assoc($resultadoCarrito)) {
    $producto_id = $item['producto_id'];
    $cantidad = $item['cantidad'];
    $precio = consultar($producto_id, 'producto', 'precio');
    
    // Insertar detalle del pedido
    $queryDetalle = "
        INSERT INTO pedido_detalle (pedido_id, producto_id, cantidad, precio) 
        VALUES ('$pedido_id', '$producto_id', '$cantidad', '$precio')
    ";
    mysqli_query($conexion, $queryDetalle);
    
    // Actualizar stock
    $nuevoStock = $item['unidades_disponibles'] - $cantidad; // Cambiado aquí
    $queryUpdateStock = "UPDATE producto SET unidades_disponibles = '$nuevoStock' WHERE id = '$producto_id'"; // Cambiado aquí
    mysqli_query($conexion, $queryUpdateStock);
}

// 4. Vaciar el carrito del usuario
$queryVaciarCarrito = "DELETE FROM carrito WHERE usuario_id = '$usuario_id'";
mysqli_query($conexion, $queryVaciarCarrito);

// 5. Confirmación de la compra y redirección
echo "<script>alert('Compra realizada con éxito. Gracias por tu compra.'); window.location.href = 'pedidos.php';</script>";

// Cerrar conexión
mysqli_close($conexion);
?>
