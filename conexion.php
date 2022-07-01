<?php
$conn = new mysqli("localhost","id18764048_admin","qGE8!#{ozd53nPZk","id18764048_empresa1_1");
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>