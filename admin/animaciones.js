
const container =  document.querySelector(".container");
aparecerDesdeAbajo(container,900);


const productos =  document.querySelector(".contenedorproductos");
aparecerDesdeAbajo(productos,900);


const elemento4 = document.getElementById("elemento4");
aparecerDesdeAbajo(elemento4,500);




const elemento3 = document.getElementById("elemento3");
aparecerDesdeAbajo(elemento3,800);

const elemento2 = document.getElementById("elemento2");
aparecerDesdeAbajo(elemento2,800);


const elemento1 = document.getElementById("elemento1");
aparecerDesdeAbajo(elemento1,700);

const contenedor = document.getElementById("contenedor");
aparecerDesdeIzquierda(contenedor,700);

const contenedorUS = document.getElementById("contenedorUS");
aparecerDesdeIzquierda(contenedorUS,700);




const contenedorF = document.getElementById("form-container");
aparecerDesdeAbajo(contenedorF,1000);



const tabla = document.querySelector('table'); // Seleccionando la primera tabla en el documento
aparecerDesdeAbajo(tabla,1000);

const footer = document.querySelector('footer'); // Seleccionando la primera tabla en el documento
aparecerDesdeAbajo(footer,1000);

const logoTitulo = document.getElementById("logo-titulo");
aparecerDesdeArriba(logoTitulo, 800);

const carusell = document.getElementById("carruselll");
aparecerDesdeAbajo(carusell,800);


const barras = document.getElementById("barras");
aparecerDesdeArriba(barras,1000);


const flecha1 = document.getElementById("flecha2");
aparecerDesdeIzquierda(flecha1,1000);

const flecha2 = document.getElementById("flecha1");
aparecerDesdeDerecha(flecha2,1000);

const categorias =document.getElementById("categoriasbarra");
aparecerDesdeAbajo(categorias,1000);







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


