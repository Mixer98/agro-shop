<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carrusellogin.css">
    <title>Agro Shop</title>

    <style>


        *{
            margin: 0px;
            padding: 0px;
            text-align: center;
        }

        body {
            display: grid;
            grid-template-columns: 25% 75%;
            grid-template-rows: 100vh;
            margin: 0;
            padding: 0;
            user-select: none;
            transition: grid-template-columns 0.5s ease-in-out;
            background-image: url('images/fondito7.jpg');
            background-size: cover;

            justify-items: stretch;
            align-items: stretch;
        }




        #login {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
  
            align-self: stretch;
            background-color: rgba(108, 88, 76, 0.6);
            box-shadow: 0px 0px 20px rgba(0, 0, 0);
            backdrop-filter: blur(3px);
            padding-top: 20px;
            transition: backdrop-filter 0.3s ease, background-color 0.3s ease;

            height: 96.7%;
        }

        h1{
            font-family: 'Segoe UI', sans-serif;
            font-size: 40px;
            font-weight: 600;
            color: rgb(240,234,210);
            white-space: nowrap;/*sin salto de linea*/
            text-shadow: 0px 0px 15px rgba(0, 0, 0);
        }
        #login h2{

            font-family: 'Segoe UI', sans-serif;
            font-size: 20px;
            font-weight: normal;
            color: rgb(240,234,210);
            align-items: center;
            
            text-shadow: 0px 0px 15px rgba(0, 0, 0);


        }
        #logo{
  
            height: 80px;
            filter: drop-shadow(0px 0px 10px);

            margin-right:15px;


        }

        .logo_texto{

            display: flex;
            justify-content: center;        /* Centrar horizontalmente */
            align-items: center; 
        }

        #login input{
            font-family: 'Segoe UI', sans-serif;
            font-size: 18px;
            font-weight: normal;
            margin: 10px;
            border-radius: 5px;
            border: none;
            height: 35px;
            box-shadow:0ch;
            width: 200px;
            background-color: rgb(240,234,210);
            text-align: center;
            outline: none;
            text-shadow: 0px,0px,15px rgba(0,0,0);
            color: rgb(0, 0, 0);
            backdrop-filter: blur(12px);
            box-shadow: 0px 2px 50px rgba(0, 0, 0, 0.256);
            border: 1px solid transparent;
            

        }

        #login input:hover{
            background-color: rgb(108, 88, 76);     
            color: rgb(240, 234, 210);                   
            border: 1px solid rgb(240, 234, 210);
            border-color: rgb(240, 234, 210); 

        }



        h2{
        font-family: 'Segoe UI', sans-serif;
        color: rgb(108,88,76);
        font-size: 5px;
        font-weight: normal;
        white-space: nowrap;/*sin salto de linea*/
        text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
        }
        

        #rg {
        text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
        margin-right: 8px;
        border-radius: 5px;
        border: none;
        font-family: 'Segoe UI', sans-serif;
        font-size: 18px;
        font-weight: normal;
        height: 35px;
        width: 85px;
        backdrop-filter: blur(12px);
        background-color: rgb(240,234,210);
        color: rgb(55, 45, 39);
        margin-right: 20px;

        }
        

        
        #is{
        background-color: rgb(240,234,210);
        text-align: center;
        border-radius: 5px;
        border: none;
        font-family: 'Segoe UI', sans-serif;
        font-size: 18px;
        font-weight: normal;
        height: 35px;
        width:90px;
        justify-content: center;  /* Centrar horizontalmente */
        align-items: center;
        backdrop-filter: blur(12px);
        color: rgb(59, 48, 41);


        }

        #is:hover, #rg:hover {
            background-color: rgb(108, 88, 76);     
            color: rgb(240, 234, 210);                   
            border: 1px solid rgb(240, 234, 210);

        }
        a{

            text-decoration: none;
        }

        



    </style>

    <style>



/* Media Queries */
@media (max-width: 1024px) {
    /* Ajustes para tablets y pantallas medianas */
    body {
        grid-template-columns: 30% 70%;
    }

    h1 {
        font-size: 32px;
    }

    #login input {
        width: 180px;
    }

    #logo {
        height: 60px;
    }

   



}

@media (max-width: 946px) {
    /* Ajustes para pantallas pequeñas como tablets verticales */
    body {
        grid-template-columns: 100%;
        grid-template-rows: auto;
    }

    #login {
        width: 100%;
        height: 100vh;
        box-shadow: none;
    }

    h1 {
        font-size: 28px;
    }

    #login input {
        width: 160px;
        font-size: 16px;
    }

    #logo {
        height: 50px;
    }

    #rg,
    #is {
        font-size: 16px;
        width: 80px;
    }



    #flecha1, #flecha2 {
    display: none;
}

}


@media (max-width: 480px) {
    /* Ajustes para dispositivos móviles */
    body {
        grid-template-columns: 100%;
        grid-template-rows: auto;
    }

    h1 {
        font-size: 24px;
    }

    #login input {
        width: 140px;
        font-size: 14px;

    }

    #rg,
    #is {
        font-size: 14px;
        width: 70px;
    }
}

    </style>
</head>

<body>
    <form action="conexion-login.php" method="post">
    <div id="login">
            <center>
            <div class="logo_texto">
            <img id="logo" src="icons/logo claro.png" alt="">
            <h1 >Agro Shop</h1>
            </div></center>

            <br> <br> <br>
            
            <h2>Usuario</h2>
            <center> <input type="text" name="usuario" id=""> </center>
            <h2>Contraseña</h2>
            <center> <input type="password" name="contrasena" id=""></center><br>

            <a href="registrousuario.html">
                <button id="rg" type="button">Registrar</button>
            </a>
            <button id="is" type="submit">Iniciar</button>

      
</div>
</form>  

<div id="carruselll" class="slider">
        <div class="slides">

                <?php 
                require 'admin/funciones.php';

                $sql = "SELECT * FROM promocion"; // Asegúrate de que 'Producto' es el nombre correcto de tu tabla
                $resultado = conectar()->query($sql);


                while ($mostrar = $resultado->fetch_assoc()) {
                    
                $id_producto_promocion = htmlspecialchars($mostrar['id_producto']);

                ?>
                <div class="slide">
                
                    <img src="admin/<?php echo consultar($id_producto_promocion,"producto","imagen"); ?>" alt="">
                    <p><?php echo htmlspecialchars($mostrar['promocion']); ?></p>   
                </div>

            <?php
            }
            ?>                       
        </div>
        
    </div>
        <button id="flecha1" class="prev" onclick="prevSlide()"><img src="icons/izquierdatrans.svg" alt=""></button>
        <button id="flecha2"class="next" onclick="nextSlide()"><img src="icons/derechatrans.svg" alt=""></button>
      
    </div>



     
</body>


<script>
</script>

<script src="carrusel.js"></script>

        <script >




            const login = document.getElementById("login");

            aparecerDesdeDerecha(login,800);



            const carrusel  = document.getElementById("carruselll");
            aparecerDesdeIzquierda(carrusel,800);

            const flecha1 = document.getElementById("flecha2");
            aparecerDesdeIzquierda(flecha1,1000);

            const flecha2 = document.getElementById("flecha1");
            aparecerDesdeDerecha(flecha2,1000);

                function aparecerDesdeArriba(container, delay) {
    document.addEventListener("DOMContentLoaded", () => {

        if (container) {
            container.style.visibility = "hidden";
            container.style.opacity = "0";
            container.style.transform = "translateY(-30px)"; // Desde arriba
            container.style.transition = "opacity 0.8s ease, transform 0.8s ease";
            
            setTimeout(() => {
                container.style.visibility = "visible";
                container.style.opacity = "1";
                container.style.transform = "translateY(0)";
 
            }, delay);
        } else {
            console.error("El contenedor proporcionado no se encontró.");
           
        }
    });
}
function aparecerDesdeAbajo(container, delay) {
    document.addEventListener("DOMContentLoaded", () => {

        if (container) {
            container.style.visibility = "hidden";
            container.style.opacity = "0";
            container.style.transform = "translateY(30px)"; // Desde abajo
            container.style.transition = "opacity 0.8s ease, transform 0.8s ease";
            
            setTimeout(() => {
                container.style.visibility = "visible";
                container.style.opacity = "1";
                container.style.transform = "translateY(0)";
                
            }, delay);
        } else {
            console.error("El contenedor proporcionado no se encontró.");
            
        }
    });
}

function aparecerDesdeIzquierda(container, delay) {
    document.addEventListener("DOMContentLoaded", () => {
       

        if (container) {
            container.style.visibility = "hidden";
            container.style.opacity = "0";
            container.style.transform = "translateX(-30px)"; // Desde izquierda
            container.style.transition = "opacity 0.8s ease, transform 0.8s ease";
            
            setTimeout(() => {
                container.style.visibility = "visible";
                container.style.opacity = "1";
                container.style.transform = "translateX(0)";
                document.body.classList.remove("animated"); // Restablece las barras después de la animación
            }, delay);
        } else {
            console.error("El contenedor proporcionado no se encontró.");
            document.body.classList.remove("animated"); // Restablece en caso de error
        }
    });
}

function aparecerDesdeDerecha(container, delay) {
    document.addEventListener("DOMContentLoaded", () => {
        

        if (container) {
            container.style.visibility = "hidden";
            container.style.opacity = "0";
            container.style.transform = "translateX(30px)"; // Desde derecha
            container.style.transition = "opacity 0.8s ease, transform 0.8s ease";
            
            setTimeout(() => {
                container.style.visibility = "visible";
                container.style.opacity = "1";
                container.style.transform = "translateX(0)";
                document.body.classList.remove("animated"); // Restablece las barras después de la animación
            }, delay);
        } else {
           
            document.body.classList.remove("animated"); // Restablece en caso de error
        }
    });
}

        </script>

</html>