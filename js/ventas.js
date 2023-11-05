products = [];
selectedProduct = null;
sumaTotales = 0;
isEdit = false;
function showProductsByCategory(category, name) {

    let datos = new FormData();

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

function GenerarVenta() {

    let datos = new FormData();

    let radios = document.getElementsByName('tipoPago');

    let tipo_pago = null;

    
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            tipo_pago = radios[i].value;
            break; 
        }
    }

    datos.append("productos", JSON.stringify(products));
    datos.append("total", sumaTotales);
    datos.append("tipo_pago", tipo_pago);

  

    $.ajax({
        url: "ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
        }

    });

}

function renderProducts(data) {
    data = JSON.parse(data);

    divContainer = document.getElementById('products_category')

    while (divContainer.firstChild) {
        divContainer.removeChild(divContainer.firstChild);
    }
    if (data.length > 0) {
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
    } else {
        msg = '<div class="col-md-12 text-center"><h5>No se encontraron articulos</h5></div>'
        divContainer.innerHTML = msg;
    }


}


function addProductTable(pr) {
   

    const rs = products.filter(
        (art) => art.id_articulo === pr.id_articulo
    );
    let title= document.querySelector('#titleModal');
  
    if (rs?.length) {
        Swal.fire({
            title: "Alerta",
            text: "El producto ya se encuentra en el carrito de compras",
            icon: "warning"
        });
        return;
    } else {
        selectedProduct = pr;
        $('#modal-form').modal('show');
        title.textContent  = pr.nombre;
    }



}

function confirmQuantity() {
    const quantityInput = document.getElementById('productQuantity');
    const quantity = parseInt(quantityInput.value);
    if (!isNaN(quantity)) {

        const rs = products.filter(
            (art) => art.id_articulo === selectedProduct.id_articulo
        );
        
        if (rs?.length) {
            prActualizado = products.find( art => art.id_articulo === selectedProduct.id_articulo)
            prActualizado.cantidad = quantity;
            $('#modal-form').modal('hide');
            Swal.fire({
                title: "Editar",
                text: "El registro fue editado exitosamente",
                icon: "success"
            });
            renderTable();
            return;
        } else{
            products.push({ ...selectedProduct, cantidad: quantity });
            Swal.fire({
                title: "Alerta",
                text: "El producto fue agregado al carrito de compras",
                icon: "success"
            });
        }
        quantityInput.value = 0;
        renderTable();

    } else {
        Swal.fire({
            title: "Error",
            text: "Ingrese valores numéricos",
            icon: "error"
        });
    }
}

function renderTable() {
    let tabla = document.getElementById("data_table");

    let filas = tabla.getElementsByTagName("tr");
    let total = document.getElementById('total');
    sumaTotales = 0;

    for (var i = filas.length - 1; i > 0; i--) {
        tabla.deleteRow(i);
    }

    products.forEach(pr => {

        let nuevaFila = document.createElement("tr");
        let subtotal = pr.cantidad * pr.precio_venta;

        sumaTotales += subtotal;

        // Define el contenido de cada celda
        let contenidoCeldas = [
            pr.nombre,
            pr.cantidad,
            pr.precio_venta,
            "$" + subtotal,
            // Celda con el botón "Editar"
            '<a class="text-primary font-weight-bold text-xs" onclick="editProduct('+pr.id_articulo+')" data-original-title="Delete user">Editar</a>',
            // Celda con el botón "Borrar"
            '<a class="text-danger font-weight-bold text-xs"  onclick="removeProduct('+pr.id_articulo+')" data-original-title="Delete user">Borrar</a>',
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

        const modal = document.getElementById('modal');
        total.textContent = '$' + sumaTotales;

        $('#modal-form').modal('hide');


    })
}

function editProduct(id_articulo){

    selectedProduct = products.find(p => p.id_articulo === id_articulo);
    
    
    title = document.getElementById('titleModal');
    title.textContent = selectedProduct.nombre;

    $('#modal-form').modal('show');
    let cantidad = document.getElementById('productQuantity');
    cantidad.value = +selectedProduct.cantidad;
   

}

function removeProduct(id_articulo){

 
   selectedProduct = products.find(p => p.id_articulo === id_articulo);

    Swal.fire({
        title: `Desea borrar el producto ${selectedProduct.nombre} ?`,
       
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
      }).then((result) => {
       
        if (result.isConfirmed) {
            products =products.filter(p=> p.id_articulo !== id_articulo)
            renderTable();
        } 
      })

   
}

const confirmButton = document.getElementById('confirmButton');
confirmButton.addEventListener('click', confirmQuantity);











