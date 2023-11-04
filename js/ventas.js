function showProductsByCategory(category, name) {

    console.log(name)
    var datos = new FormData();

    datos.append("id_categoria", category);

    
    title = document.getElementById('selected_category')
    title.textContent = name;

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            renderProducts(response)
        }

    });

}

function renderProducts(data) {
    data = JSON.parse(data);
    
    divContainer = document.getElementById('products_category')

    while (divContainer.firstChild) {
        divContainer.removeChild(divContainer.firstChild);
    }

    data.forEach(pr => {
        // Crear un contenedor div con clase "col-md-4"
        var colDiv = document.createElement("div");
        colDiv.className = "col-md-4";

        // Crear un div con clase "producto"
        var productoDiv = document.createElement("div");
        productoDiv.className = "producto";

        // Crear un botón
        var btn = document.createElement("a");
        btn.className = "btn btn-outline-primary";
        btn.setAttribute("data-bs-toggle", "modal");
        btn.setAttribute("data-bs-target", "#modal-form-product");
        btn.textContent = pr.id_articulo +" - " + pr.nombre + ' $' + pr.precio_venta;

        // Crear un div para el modal
        var modalDiv = document.createElement("div");
        modalDiv.className = "modal fade";
        modalDiv.id = "modal-form-product";
        modalDiv.tabIndex = "-1";
        modalDiv.role = "dialog";
        modalDiv.setAttribute("aria-labelledby", "modal-form");
        modalDiv.setAttribute("aria-hidden", "true");

        // ... Crear el contenido del modal (modal-dialog, modal-content, etc.)

        // Agregar el botón al contenedor "producto"
        productoDiv.appendChild(btn);

        // Agregar el "producto" y el modal al contenedor "col-md-4"
        colDiv.appendChild(productoDiv);
        colDiv.appendChild(modalDiv);

        // Agregar el contenedor "col-md-4" al documento
        divContainer.appendChild(colDiv);

    });

 



    /* */
}



