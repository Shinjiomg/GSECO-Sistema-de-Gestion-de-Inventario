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

function viewPDFCompra(id_compra){

    const url = `reports/compra.php?id_compra=${id_compra}`;

    // Abre una ventana emergente
    window.open(url, '_blank', 'width=800,height=600,scrollbars=yes');

}