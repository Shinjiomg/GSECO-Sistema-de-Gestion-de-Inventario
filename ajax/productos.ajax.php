<?php
require_once "../models/articulo.php";

if(isset($_POST["id_categoria"])){

	$producto = new Articulo();
	$category= intval($_POST["id_categoria"]);
    
	echo json_encode($producto -> articuloByCategory($category));

}

if(isset($_POST["id_articulo"])){

	$producto = new Articulo();
	$id_articulo = intval($_POST["id_articulo"]);
    
	echo json_encode($producto -> show($id_articulo));

}



