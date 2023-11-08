function guardarCategoria(){
    let categoria = document.getElementById("categoria").value
    console.log(categoria)
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
            Swal.fire({
                title: "Generar categoria",
                text: "La categoria se guardo correctamente",
                icon: "success"
            });
            $('#modal-form').modal('hide');
        }
    });
}