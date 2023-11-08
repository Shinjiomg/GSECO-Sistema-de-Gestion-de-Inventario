function guardarCategoria(){
    let categoria = document.getElementById("categoria").value
    let datos = new FormData();
    datos.append("categoria", categoria);
    $.ajax({
        url: "ajax/categoria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
        }
    });
}