selectCategory = null;
categories = [];

window.onload = function () {
    getCategories();
};


function getCategories(){
    let datos = new FormData();

    datos.append('all', 'all');

    $.ajax({
        url: "ajax/categoria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            renderCategories(response)

        }
    });
}

function renderCategories(data) {
    categories = JSON.parse(data);
    renderTable();
}


function guardarCategoria(){
    let categoria = document.getElementById("categoria").value
   
    if(selectCategory){
        //! Todo realizar edit category
        return;
    }

    createCategory(categoria);
   
}

function createCategory(categoria){

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
                text: "La categoria se guardó correctamente",
                icon: "success"
            });
            $('#modal-form').modal('hide');
        }
    });

}

function renderTable(){
    let tabla = document.getElementById("categories_table");

    let filas = tabla.getElementsByTagName("tr");


    for (var i = filas.length - 1; i > 0; i--) {
        tabla.deleteRow(i);
    }


}