products = [];

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
        colDiv.addEventListener("click", function () {
            // Llama a la función addProductTable con el valor de pr
            addProductTable(pr);
        });

        // Crear un div con clase "producto"
        var productoDiv = document.createElement("div");
        productoDiv.className = "producto";

        // Crear un botón
        var btn = document.createElement("a");
        btn.className = "btn btn-outline-primary";
        /*      btn.setAttribute("data-bs-toggle", "modal");
             btn.setAttribute("data-bs-target", "#modal-form-product"); */
        btn.textContent = pr.id_articulo + " - " + pr.nombre + ' $' + pr.precio_venta;

        // Crear un div para el modal
        var modalDiv = document.createElement("div");
        modalDiv.className = "modal fade";
        modalDiv.id = "modal-form-product";
        modalDiv.tabIndex = "-1";
        modalDiv.role = "dialog";
        modalDiv.setAttribute("aria-labelledby", "modal-form");
        modalDiv.setAttribute("aria-hidden", "true");


        productoDiv.appendChild(btn);

        colDiv.appendChild(productoDiv);
        colDiv.appendChild(modalDiv);

        divContainer.appendChild(colDiv);

    });

    function addProductTable(pr) {
        products.push(pr);
        let tabla = document.getElementById("data_table");

        products.forEach(pr => {

            var nuevaFila = document.createElement("tr");

            // Define el contenido de cada celda
            var contenidoCeldas = [
                pr.nombre,
                "3",
                pr.precio_venta,
                "$7500",
                // Celda con el botón "Editar"
                '<a href="#" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal-form-edit-product" data-toggle="tooltip" data-original-title="Edit user">Editar</a>',
                // Celda con el botón "Borrar"
                '<a class="text-danger font-weight-bold text-xs" data-original-title="Delete user">Borrar</a>',
            ];

            // Itera sobre el contenido de las celdas y crea celdas <td>
            contenidoCeldas.forEach(function (contenido) {
                var celda = document.createElement("td");
                var parrafo = document.createElement("p");
                parrafo.innerHTML = contenido;
                celda.appendChild(parrafo);
                nuevaFila.appendChild(celda);
            });

            // Agrega la nueva fila a la tabla
            tabla.querySelector("tbody").appendChild(nuevaFila);


        })


    }






}



