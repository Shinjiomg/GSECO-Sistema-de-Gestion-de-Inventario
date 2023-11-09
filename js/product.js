selectProduct = null;

function editProduct(id){
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
        }

    });
}

function renderData(data){
    selectProduct = JSON.parse(data);
   
    console.log(selectProduct)
    let nombre = document.getElementById('product_name');
    let cantidad = document.getElementById('product_stock');
    let precio = document.getElementById('product_price');
    let stockMaximo = document.getElementById('stock_maximo');

    nombre.value = selectProduct.nombre;
    cantidad.value = selectProduct.stock;
    precio.value = selectProduct.precio_venta;
    stockMaximo.value = selectProduct.stock_deseado;

    $('#modal-form-product').modal('show');

}


