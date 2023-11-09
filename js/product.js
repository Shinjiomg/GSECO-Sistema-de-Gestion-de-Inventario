selectProduct = null;

function editProduct(id) {
    let datos = new FormData();

    datos.append("id_articulo", id);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            renderData(response)
            $('.modal-title').text('Editar producto');
        }
    });
}

function saveProduct() {

    let nombre = document.getElementById('product_name').value;
    let cantidad = document.getElementById('product_stock').value;
    let precio = document.getElementById('product_price').value;
    let stockMaximo = document.getElementById('stock_maximo').value;
    let selectCategoria = document.getElementById('categories_select').value;
    saveEditProduct(nombre, cantidad, precio, stockMaximo, selectCategoria);

}







//! Todo: realizar el de creacion



function saveEditProduct(nombre, cantidad, precio, stockMaximo, selectCategoria) {

    let datos = new FormData();

    let product_edit = {
        nombre,
        cantidad,
        precio,
        stockMaximo,
        selectCategoria,
        id_articulo: selectProduct.id_articulo
    }


    datos.append("product_edit", JSON.stringify(product_edit));
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {

            Swal.fire({
                title: "Productos",
                text: "El producto fue editado de forma exitosa",
                icon: "success"
            });


        }

    });
}

function renderData(data) {
    selectProduct = JSON.parse(data);

    console.log(selectProduct)
    let nombre = document.getElementById('product_name');
    let cantidad = document.getElementById('product_stock');
    let precio = document.getElementById('product_price');
    let stockMaximo = document.getElementById('stock_maximo');
    let selectCategoria = document.getElementById('categories_select');

    nombre.value = selectProduct.nombre;
    cantidad.value = selectProduct.stock;
    precio.value = selectProduct.precio_venta;
    stockMaximo.value = selectProduct.stock_deseado;
    selectCategoria.value = selectProduct.categoria_id_categoria;


    $('#modal-form-product').modal('show');

}

