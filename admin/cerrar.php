<?php

    require "funciones.php";
    
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
    
?>