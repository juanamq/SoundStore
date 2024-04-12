let carrito = [];

function agregarProducto(nombreProducto, precioProducto) {
    let producto = {
        nombre: nombreProducto,
        precio: precioProducto,
        cantidad: 1
    };

    for (let i = 0; i < carrito.length; i++) {
        if (carrito[i].nombre === nombreProducto) {
            carrito[i].cantidad++;
            actualizarCarrito();
            return;
        }
    }

    carrito.push(producto);
    actualizarCarrito();
}

function eliminarProducto(nombreProducto) {
    for (let i = 0; i < carrito.length; i++) {
        if (carrito[i].nombre === nombreProducto) {
            if (carrito[i].cantidad > 1) {
                carrito[i].cantidad--;
            }
            else {
                carrito.splice(i, 1);
            }
            actualizarCarrito();
            return;
        }
    }
}

function actualizarCarrito() {
    let total = 0;
    let contenido = "";

    for (let i = 0; i < carrito.length; i++) {
        let producto = carrito[i];
        total += producto.precio * producto.cantidad;
        contenido += "<tr>";
        contenido += "<td>" + producto.nombre + "</td>";
        contenido += "<td>" + producto.precio + "</td>";
        contenido += "<td>" + producto.cantidad + "</td>";
        contenido += "<td><button onclick=\"eliminarProducto('" + producto.nombre + "')\">Eliminar</button></td>";
        contenido += "</tr>";
    }

    document.getElementById("carrito-contenido").innerHTML = contenido;
    document.getElementById("carrito-total").innerHTML = total;
}