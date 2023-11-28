<?php
require_once "../models/gastos.php";
session_start();
$var_session = $_SESSION['id_usuario'];

if(isset($_POST["all"])){
	$gasto = new Gastos();
	echo json_encode( $gasto->all($var_session));
	
}

if(isset($_POST["range_dates"])){
	$gastos = new Gastos();

	$range= $_POST["range_dates"];

	echo json_encode($gastos -> ventasPorRango($range));


}



if(isset($_POST["descripcion"])){

	echo 'entro';
	$gasto = new Gastos();

	$descripcion= $_POST["descripcion"];
	$total= $_POST["total"];
    
    echo json_encode( $gasto->store($descripcion, $total, $var_session));

}



