// Función para alternar el menú de "Categorías" con animación desde arriba
function toggleMenu() {
    var dropdown = document.getElementById("dropdownMenu");

    if (dropdown.classList.contains("show-menu")) {
        // Ocultar el menú con animación
        dropdown.style.transform = "translateY(-20px)";
        dropdown.style.opacity = "0";
        setTimeout(() => {
            dropdown.classList.remove("show-menu");
            dropdown.style.transform = "";  // Restablecer estilos
            dropdown.style.opacity = "";
        }, 300); // Duración de la animación de salida
    } else {
        // Mostrar el menú con animación desde arriba
        dropdown.classList.add("show-menu");
        dropdown.style.transform = "translateY(-20px)";
        dropdown.style.opacity = "0";
        setTimeout(() => {
            dropdown.style.transform = "translateY(0)";
            dropdown.style.opacity = "1";
        }, 10); // Duración de la animación de entrada
    }
}

// Cerrar el menú de "Categorías" si el puntero sale del área del submenú
document.getElementById("dropdownMenu").addEventListener("mouseleave", function() {
    this.style.transform = "translateY(-20px)";
    this.style.opacity = "0";
    setTimeout(() => {
        this.classList.remove("show-menu");
        this.style.transform = "";
        this.style.opacity = "";
    }, 300);
});

// Función para alternar el menú de usuario con animación desde arriba
function toggleMenu() {
    var dropdown = document.getElementById("dropdownMenu");

    if (dropdown.classList.contains("show-menu")) {
        // Ocultar el menú con animación
        dropdown.style.transform = "translateY(-20px)";
        dropdown.style.opacity = "0";
        setTimeout(() => {
            dropdown.classList.remove("show-menu");
            dropdown.style.transform = "";  // Restablecer estilos
            dropdown.style.opacity = "";
        }, 300); // Duración de la animación de salida
    } else {
        // Mostrar el menú con animación desde arriba
        dropdown.classList.add("show-menu");
        dropdown.style.pointerEvents = "none"; // Desactivamos interacción mientras anima
        dropdown.style.transform = "translateY(-20px)";
        dropdown.style.opacity = "0";
        setTimeout(() => {
            dropdown.style.transform = "translateY(0)";
            dropdown.style.opacity = "1";
        }, 10);

        // Habilitamos pointer-events y el evento mouseleave después de animar
        setTimeout(() => {
            dropdown.style.pointerEvents = "auto"; // Reactivamos interacción
            enableMenuCloseAfterAnimation(dropdown); // Activamos el cierre
        }, 310); // Esperamos que termine la animación
    }
}



function enableMenuCloseAfterAnimation(menuElement) {
    function closeMenu() {
        menuElement.removeEventListener("mouseleave", closeMenu);
        menuElement.style.transform = "translateY(-20px)";
        menuElement.style.opacity = "0";
        setTimeout(() => {
            menuElement.classList.remove("show-menu");
            menuElement.style.transform = "";
            menuElement.style.opacity = "";
        }, 300);
    }

    menuElement.addEventListener("mouseleave", closeMenu);
}

function toggleUserMenu() {
    var menu = document.getElementById("userMenu");

    if (menu.classList.contains("show-menu")) {
        // Ocultar el menú con animación
        menu.style.transform = "translateY(-20px)";
        menu.style.opacity = "0";
        setTimeout(() => {
            menu.classList.remove("show-menu");
            menu.style.transform = "";
            menu.style.opacity = "";
        }, 300);
    } else {
        // Mostrar el menú con animación desde arriba
        menu.classList.add("show-menu");
        menu.style.pointerEvents = "none"; // Desactiva interacción mientras anima
        menu.style.transform = "translateY(-20px)";
        menu.style.opacity = "0";
        setTimeout(() => {
            menu.style.transform = "translateY(0)";
            menu.style.opacity = "1";
        }, 10);

        setTimeout(() => {
            menu.style.pointerEvents = "auto"; // Reactiva
            enableMenuCloseAfterAnimation(menu); // Mismo sistema que para el de Categorías
        }, 310);
    }
}
