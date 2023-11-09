<?php
require_once "../models/venta.php";

session_start();
$var_session = $_SESSION['id_usuario'];

if(isset($_POST["productos"])){

	$venta = new Venta();

	$productos= $_POST["productos"];
	$total= $_POST["total"];
	$tipoPago = $_POST["tipo_pago"];
	 

    $venta->store($var_session, $total, $productos, $tipoPago);

}
