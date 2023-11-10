<?php
require_once "../models/categoria.php";

if(isset($_POST["categoria"])){

	$cat = new Categoria();

	$nombre= $_POST["categoria"];
    
    echo json_encode( $cat->store($nombre));

}

if(isset($_POST["all"])){
	$cat = new Categoria();
    echo json_encode($cat->index());

}