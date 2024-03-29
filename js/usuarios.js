selectedUser = null;
users

 = [];


getUsers();


function getUsers() {

    let datos = new FormData();

    datos.append('all', 'all');

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            renderUsers(response)

        }
    });

}




function guardarUsuario(nombres, apellidos, tipo_doc, num_doc,  email, password, selected_rol) {

    let newUser = {
        nombres,
        apellidos,
        tipo_doc,
        num_doc,
        email,
        password,
        selected_rol
    }

    let datos = new FormData();

    datos.append('new_user', JSON.stringify(newUser));

    let rol = document.getElementById('rol_selected');

    let selectedText = rol.options[rol.selectedIndex].text;

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            Swal.fire({
                title: "Generar Usuario",
                text: "El usuario se guardó correctamente",
                icon: "success",
                timer: 1500
            });
            let newUser = JSON.parse(response);
            users
            
            .push({ ...newUser, rol_id_rol: selectedText })

            renderTable();
            $('#modal-form-users').modal('hide');
        }
    });
}


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


function eliminarUsuario(id_usuario) {
    let datos = new FormData();
    datos.append("id_eliminar", id_usuario);
    Swal.fire({
        title: `¿Quieres borrar el usuario?`,

        showCancelButton: true,
        confirmButtonText: 'Aceptar',
    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/usuarios.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    users = users.filter(p => p.id_usuario !== id_usuario)
                    renderTable();
                }
            });

        }
    })



}

function renderTable() {
    let tabla = document.getElementById("data_table_users");
    let filas = tabla.getElementsByTagName("tr");
    for (var i = filas.length - 1; i > 0; i--) {
        tabla.deleteRow(i);
    }
    users
    
    .forEach(pr => {
        let nuevaFila = document.createElement("tr");
        nuevaFila.classList.add('text-center', 'text-uppercase', 'text-black', 'text-xs', 'font-weight-bolder');
        var precioVentaFormateado = parseFloat(pr.precio_venta).toLocaleString('es-CO');
        // Define el contenido de cada celda
        let contenidoCeldas = [
            pr.nombres,
            pr.apellidos,
            pr.tipo_documento,
            pr.email,
            ` <a data-bs-toggle="tooltip" title="Borrar" class="text-danger font-weight-bold text-xs"   onclick="eliminarUsuario(${pr.id_usuario})"><i class="fas fa-trash" style='font-size:24px'></i></a>`
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

function renderUsers(data) {
    users
    
     = JSON.parse(data);
    renderTable();

}

function saveUser() {
    let nombres = document.getElementById('user_name').value;
    let apellidos = document.getElementById('user_last_name').value;
    let tipo_doc = document.getElementById('user_doc_type').value;
    let num_doc = document.getElementById('num_doc').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let selected_rol = document.getElementById('rol_selected').value;

   /*  if (selectedUser) {
        saveEditProduct(nombre, cantidad, precio, stockMaximo, selectCategoria);
        return;
    } */
    guardarUsuario(nombres,
        apellidos,
        tipo_doc,
        num_doc,
        email,
        password,
        selected_rol);
}

function saveEditProduct(nombre, cantidad, precio, stockMaximo, selectCategoria) {

    let category = document.getElementById('categories_select');

    var selectedText = category.options[category.selectedIndex].text;

    let datos = new FormData();

    let product_edit = {
        nombre,
        cantidad,
        precio,
        stockMaximo,
        selectCategoria,
        id_articulo: selectedUser.id_articulo
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
                icon: "success",
                timer: 1500
            });

            users
            
             = users
            
            .map(ar => {
                if (ar.id_articulo === selectedUser.id_articulo) {
                    return {
                        ...ar,
                        nombre: nombre,
                        precio_venta: precio,
                        stock: cantidad,
                        categoria_id_categoria: selectCategoria,
                        stock_deseado: stockMaximo,
                        categoria: selectedText
                    }

                }
                return ar
            })

            renderTable();
            selectedUser = null;

            $('#modal-form-product').modal('hide');
        }
    });
}

function renderData(data) {
    selectedUser = JSON.parse(data);

    let nombre = document.getElementById('product_name');
    let cantidad = document.getElementById('product_stock');
    let precio = document.getElementById('product_price');
    let stockMaximo = document.getElementById('stock_maximo');
    let selectCategoria = document.getElementById('categories_select');

    nombre.value = selectedUser.nombre;
    cantidad.value = selectedUser.stock;
    precio.value = selectedUser.precio_venta;
    stockMaximo.value = selectedUser.stock_deseado;
    selectCategoria.value = selectedUser.categoria_id_categoria;


    $('#modal-form-product').modal('show');

}


