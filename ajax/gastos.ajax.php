<?php
require_once "../models/gastos.php";
session_start();
$var_session = $_SESSION['id_usuario'];



if(isset($_POST["descripcion"])){

	$gasto = new Gastos();

	$descripcion= $_POST["descripcion"];
	$total= $_POST["total"];
    
    echo json_encode( $gasto->store($descripcion, $total, $var_session));

}



