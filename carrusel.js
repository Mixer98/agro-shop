document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelector('.slides');
    const slideElements = document.querySelectorAll('.slide');
    const totalSlides = slideElements.length;
    let currentSlide = 0;

    // Ajustar el ancho de '.slides' dinámicamente basado en la cantidad de '.slide'
    slides.style.width = `${totalSlides * 100}vw`;

    // Mostrar el slide actual
    function showSlide(index) {
        currentSlide = (index + totalSlides) % totalSlides;
        slides.style.transform = `translateX(-${currentSlide * 100}vw)`;
    }

    // Siguiente slide
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Slide anterior
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Añadir eventos a los botones
    document.querySelector('.next').addEventListener('click', nextSlide);
    document.querySelector('.prev').addEventListener('click', prevSlide);

    // Cambiar de slide automáticamente cada 2 segundos (puedes desactivarlo si no lo necesitas)
    setInterval(nextSlide, 5000);
});
