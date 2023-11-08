<?php
require_once "../models/categoria.php";

if(isset($_POST["categoria"])){

	$cat = new Categoria();

	$nombre= $_POST["categoria"];
    
    $cat->store($nombre);

}