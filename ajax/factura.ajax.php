<?php
require_once "../models/compra.php";

session_start();
$var_session = $_SESSION['id_usuario'];


if(isset($_POST["all"])){
	
    $compra = new Compras();
    echo json_encode($compra->facturas($var_session));
}
