function filterByCategory(category) {
    fetch('./models/articulo.php?id_categoria=' + category)
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
    });
}



