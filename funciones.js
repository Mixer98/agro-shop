        function gcarrito(id) {
            if (confirm('¿Agregar al Carrito?')) {
                // Solicitar la cantidad de elementos a agregar
                var cantidad = prompt('¿Cuántos elementos deseas añadir?');

                // Validar que la cantidad sea un número válido y mayor que cero
                if (cantidad !== null && !isNaN(cantidad) && cantidad > 0) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'guardar_carrito.php';
                    
                    // Input oculto para el ID del producto
                    var inputId = document.createElement('input');
                    inputId.type = 'hidden';
                    inputId.name = 'id_producto';
                    inputId.value = id;
                    
                    // Input oculto para la cantidad
                    var inputCantidad = document.createElement('input');
                    inputCantidad.type = 'hidden';
                    inputCantidad.name = 'cantidad';
                    inputCantidad.value = cantidad;

                    // Agregar los inputs al formulario
                    form.appendChild(inputId);
                    form.appendChild(inputCantidad);
                    document.body.appendChild(form);
                    form.submit();
                    
                    // Volver a la página anterior (después de un pequeño retraso)
                    setTimeout(function() {
                        alert('Producto agregado al carrito. Volviendo a la página anterior.');
                        history.back(); // Regresar a la página anterior
                    }, 2000); // Esperar 2 segundos antes de volver
                } else {
                    alert('Por favor, ingresa una cantidad válida.');
                }
            }
        }


function info(id) {
    if (confirm('Informacion')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'producto.php';
        
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id_producto';
        input.value = id;
    
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}



function eliminarDcarrito(id) {
    if (confirm('Desea eliminar del carrito')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'eliminarDcarrito.php';
        
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'elemento_id';
        input.value = id;
        
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}


function actualizarCantidad(carritoId) {
    // Usar prompt para pedir la nueva cantidad
    const nuevaCantidad = prompt("Ingresa la nueva cantidad:");

    // Validar si el usuario ingresó una cantidad válida
    if (nuevaCantidad !== null && nuevaCantidad > 0) {
        // Realizar una llamada AJAX para actualizar la cantidad en el servidor
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "actualizar_cantidad.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.status === 200) {
                alert("Cantidad actualizada con éxito.");
                location.reload(); // Recargar la página para ver los cambios
            } else {
                alert("Error al actualizar la cantidad.");
            }
        };
        xhr.send(`carrito_id=${carritoId}&nueva_cantidad=${nuevaCantidad}`);
    } else {
        alert("Por favor, ingresa una cantidad válida.");
    }
}



function descuento(precioOriginal, porcentajeDescuento, precioConDescuento) {
    // Convertir las variables a números si están en formato de texto
    precioOriginal = parseFloat(precioOriginal);
    porcentajeDescuento = parseFloat(porcentajeDescuento);
    precioConDescuento = parseFloat(precioConDescuento);

    // Formatear los precios a pesos colombianos
    let precioOriginalCol = precioOriginal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
    let precioConDescuentoCol = precioConDescuento.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });

    // Mostrar el mensaje con las variables formateadas
    alert("Precio original: " + precioOriginalCol +
        "\nPorcentaje de descuento: " + porcentajeDescuento + "%" +
        "\nPrecio con descuento: " + precioConDescuentoCol);
}
