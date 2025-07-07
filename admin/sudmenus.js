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
function toggleUserMenu() {
    var menu = document.getElementById("userMenu");

    if (menu.classList.contains("show-menu")) {
        // Ocultar el menú con animación
        menu.style.transform = "translateY(-20px)";
        menu.style.opacity = "0";
        setTimeout(() => {
            menu.classList.remove("show-menu");
            menu.style.transform = "";  // Restablecer estilos
            menu.style.opacity = "";
        }, 300);
    } else {
        // Mostrar el menú con animación desde arriba
        menu.classList.add("show-menu");
        menu.style.transform = "translateY(-20px)";
        menu.style.opacity = "0";
        setTimeout(() => {
            menu.style.transform = "translateY(0)";
            menu.style.opacity = "1";
        }, 10);
    }
}

// Cerrar el menú de usuario si el puntero sale del área del submenú
document.getElementById("userMenu").addEventListener("mouseleave", function() {
    this.style.transform = "translateY(-20px)";
    this.style.opacity = "0";
    setTimeout(() => {
        this.classList.remove("show-menu");
        this.style.transform = "";
        this.style.opacity = "";
    }, 300);
});
