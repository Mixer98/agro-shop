<?php
function conectar(){
    require __DIR__ . '/conexion.php'; // Incluye solo las variables
    $conexion = mysqli_connect($host, $usuario, $clave, $bd);
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $conexion;
}

function consultar($id, $tabla, $columna) { 
    $conexion = conectar(); // Llamar a la función de conexión

    // Definir la consulta SQL para seleccionar el valor de la columna específica
    $sql = "SELECT $columna FROM $tabla WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $valor = $fila[$columna]; // Obtener el valor de la columna especificada
    } else {
        $valor = null; // Si no hay resultados, retornar null
    }
    // Cerrar la conexión
    mysqli_close($conexion);
    return $valor; // Retornar el valor obtenido
}

function iniciar($usuario) {
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Inicia la sesión si no está activa
    } 
    $_SESSION['usuario'] = $usuario;

    setcookie('usuario', $usuario, time() + 604800, "/");
}

function cambiar($id, $tabla, $columna, $nuevo_valor) { 
    $conexion = conectar(); // Llamar a la función de conexión

    // Escapar el valor para prevenir inyecciones SQL
    $nuevo_valor = mysqli_real_escape_string($conexion, $nuevo_valor);

    // Definir la consulta SQL para actualizar el valor de la columna específica
    $sql = "UPDATE $tabla SET $columna = '$nuevo_valor' WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        $exito = true; // Actualización exitosa
    } else {
        $exito = false; // Hubo un problema al actualizar
    }

    // Cerrar la conexión
    mysqli_close($conexion);

    return $exito; // Retornar true si se actualizó correctamente, false si no
}


function cambiarNumero($id, $tabla, $columna, $nuevo_valor) { 
    $conexion = conectar(); // Llamar a la función de conexión

    // Validar que el nuevo valor sea numérico
    if (!is_numeric($nuevo_valor)) {
        echo "<script>alert('Error: El nuevo valor no es un número válido.');</script>";
        return false;
    }

    // Crear la consulta SQL con el nombre de la columna entre comillas invertidas
    $sql = "UPDATE $tabla SET `$columna` = $nuevo_valor WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        return true; // Retornar true si se actualizó correctamente
    } else {
        // Mostrar el error específico si hay uno
        echo "<script>alert('Hubo un error al realizar el cambio: " . mysqli_error($conexion) . "');</script>";
        return false; // Retornar false si no se actualizó
    }

    // Cerrar la conexión

}





function cerrarSesion() {
    // Iniciar la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Eliminar la cookie de sesión, si existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión o cualquier otra
    header("Location: ./login.php");
    exit();
}

function iniciarSesion($usuario, $rol, $idUsuario) {
    // Inicia la sesión si no ha sido iniciada aún
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Establece variables de sesión con los valores necesarios
    $_SESSION['usuario'] = $usuario;       // Nombre del usuario
    $_SESSION['rol'] = $rol;                // Rol del usuario (ej. admin, usuario)
    $_SESSION['id_usuario'] = $idUsuario;   // ID del usuario
    $_SESSION['inicio'] = time();            // Tiempo de inicio de la sesión, si es necesario

    // Redirige a la página de inicio
     // Redirigir según el rol del usuario
     if (isset($_SESSION['rol'])) {
        // Si el rol es "admin", redirigir al index de administrador
        if ($_SESSION['rol'] == 'admin') {
            header("Location: admin/adminindex.php");
            exit(); // Finaliza el script después de la redirección

        // Si el rol es "usuario", redirigir al index normal
        } else if ($_SESSION['rol'] == 'usuario') {
            header("Location: index.php");
            exit(); // Finaliza el script después de la redirección

        } else {
            // Si el rol no es reconocido, redirigir a una página de error o login
            echo "Rol no reconocido";
            exit();
        }

    } else {
        // Si no hay un rol en la sesión, el usuario no ha iniciado sesión

        cerrarSesion();

        header("Location: login.php");
        
        exit();
    }

}

function verificarSesion() {
    // Inicia la sesión si aún no ha sido iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Comprobar si todas las variables de sesión necesarias están configuradas
    if (isset($_SESSION['usuario']) && isset($_SESSION['rol']) && isset($_SESSION['id_usuario'])) {
        // Opcional: Validar datos específicos de la sesión (ej. valores de rol permitidos)
        if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'usuario') {
            return true; // Sesión válida y completa
        } else {
            // Rol no válido o sesión manipulada
            cerrarSesion(); // Llama a la función para cerrar la sesión
            return false;
        }
    } else {
        // Falta alguna variable de sesión, redirige al usuario para iniciar sesión
        echo "<script language='javaScript'>
        alert('Por Favor inicie Secion');
        location.assign('./cerrar.php');
        </script>"; // Cierra la sesión en caso de datos incompletos o no válidos
        return false;
    }
}

function verificarsecionAdministrativa(){

    if($_SESSION['rol']==='admin'){


    }else{
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Destruir todas las variables de sesión
        $_SESSION = array();
    
        // Eliminar la cookie de sesión, si existe
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        // Finalmente, destruir la sesión
        session_destroy();

        
        echo "<script language='javaScript'>

        alert('Session Administrativa Protegida y destruida');


        location.assign('../login.php');
        </script>"; 
        // Redirigir a la página de inicio de sesión o cualquier otra

        exit();

    }


}

function verificarsecionEstandar(){

    if($_SESSION['rol']==='usuario'){



    }else{
        echo "<script>
        alert('Seccion de rol estandar Protegida :(');
        window.location.href = './cerrar.php';
        </script>";


    }


}




function RedirigirConPost($valor, $url) {
    echo "
    <form id='redireccionar' action='$url' method='post'>
        <input type='hidden' name='id' value='$valor'>
    </form>
    <script type='text/javascript'>
        document.getElementById('redireccionar').submit();
    </script>
    ";
}


function eliminar($idProducto, $tabla) {
    // Conectar a la base de datos
    $conexion = conectar();

    // Escapar el ID del producto para evitar inyecciones SQL
    $id = mysqli_real_escape_string($conexion, $idProducto);

    // Crear la consulta SQL para eliminar el producto
    $consulta = "DELETE FROM $tabla WHERE id = '$id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        
        mysqli_close($conexion);
        echo "<script>
                alert('Producto eliminado exitosamente');
              </script>";
    } else {
        mysqli_close($conexion);
        echo "<script>
                alert('Error al eliminar el producto: " . mysqli_error($conexion) . "');
                window.location.href = 'adminindex.php';
              </script>";
    }

    // Cerrar la conexión
    
}

function eliminarUsuario($idProducto, $tabla) {
    // Conectar a la base de datos
    $conexion = conectar();

    // Escapar el ID para evitar inyecciones SQL
    $id = mysqli_real_escape_string($conexion, $idProducto);

    // Eliminar los registros dependientes en la tabla `carrito`
    $consultaCarrito = "DELETE FROM carrito WHERE usuario_id = '$id'";
    mysqli_query($conexion, $consultaCarrito);

    // Crear la consulta SQL para eliminar el usuario o producto
    $consulta = "DELETE FROM $tabla WHERE id = '$id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "<script>
                alert('Usuario eliminado exitosamente');
                window.location.href = 'adminindex.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al eliminar el usuario: " . mysqli_error($conexion) . "');
                window.location.href = 'adminindex.php';
              </script>";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}




function aplicarDescuento($precio, $porcentajeDescuento) {
    // Calcula el descuento
    $descuento = ($precio * $porcentajeDescuento) / 100;
    // Resta el descuento al precio original
    $precioConDescuento = $precio - $descuento;
    // Retorna el precio con el descuento aplicado
    return $precioConDescuento;
}



function direccion() {

    $usuario_id = $_SESSION['id_usuario'];


    $direccion = consultar($usuario_id, 'usuarios', 'direccion');


    if (empty($direccion)) {

        echo "<script type='text/javascript'>
                alert('Por Favor Configura tu direccion');
                window.location.href = 'editarU.php'; // Cambia esta URL según lo necesites
              </script>";
        exit; 
    }
}





?>
