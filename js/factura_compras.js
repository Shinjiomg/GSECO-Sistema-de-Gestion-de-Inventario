function ProductsByCategory() {

    let datos = new FormData();

    datos.append("all", "all");

    $.ajax({
        url: "ajax/factura.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
           
        }

    });

}