<?php
include_once("conexion.php"); 
 
$cod = $_GET['id_Producto'];
 
mysqli_query($conn, "DELETE FROM productos WHERE id_Producto=$cod");
 
header("Location:inicio.php");

?>