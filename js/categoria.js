selectCategory = null;
categories = [];


getCategories();



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
    renderTableCategories();
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
            categories.push({
                ...JSON.parse(response)
            })
            renderTableCategories();
            Swal.fire({
                title: "Generar categoria",
                text: "La categoria se guardó correctamente",
                icon: "success"
            });
            $('#modal-form').modal('hide');
        }
    });

}

function renderTableCategories(){
    let tabla = document.getElementById("categories_table");

    let filas = tabla.getElementsByTagName("tr");


    for (var i = filas.length - 1; i > 0; i--) {
        tabla.deleteRow(i);
    }

    categories.forEach(c => {

        let nuevaFila = document.createElement("tr");
        nuevaFila.classList.add('text-center', 'text-uppercase', 'text-black', 'text-xxs', 'font-weight-bolder','opacity-7');
      
        // Define el contenido de cada celda
        let contenidoCeldas = [
            c.nombre,
            c.estado === 1 ? '<span class="badge badge-sm bg-gradient-success">Disponible</span>': '<span class="badge badge-sm bg-gradient-danger">No disponible</span>',
            ` <a data-bs-toggle="tooltip" title="Editar" class="text-primary font-weight-bold text-xs" href=""><i class="fas fa-edit" style='font-size:24px'></i></a>`,
            `<a data-bs-toggle="tooltip" title="Borrar" class="text-danger font-weight-bold text-xs" href=""><i class="fas fa-trash" style='font-size:24px'></i></a>`
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

    });



}