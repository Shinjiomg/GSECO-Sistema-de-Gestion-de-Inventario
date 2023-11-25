// function ventasPorRango(fecha_inicio, fecha_final) {
//     console.log(fecha_inicio)
//     console.log(fecha_final)
// }

function viewPDFVentas(id_usuario) {
    const url = `reports/venta_rango.php?id_usuario=${id_usuario}&fecha_inicio=${fecha_inicio}&fecha_final=${fecha_final}`;

    // Abre una ventana emergente
    window.open(url, '_blank', 'width=800,height=600,scrollbars=yes');
}

function validarCantidad(input) {
    if (input.value < 0) {
        input.value = 0;
    }
}