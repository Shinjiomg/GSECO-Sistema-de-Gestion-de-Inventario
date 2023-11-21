
function gastos(){
    $('#modal-gastos').modal('show');
}

function guardar(){
    let descripcion = document.getElementById("description_bills").value
    let total = document.getElementById("total_bills").value

    let gastos = new FormData();

    gastos.append("descripcion", descripcion);
    gastos.append("total", total);


    $.ajax({
        url: "ajax/gastos.ajax.php",
        method: "POST",
        data: gastos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            $('#modal-gastos').modal('hide');
        }

    });

}
