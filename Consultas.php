<?php
    session_start();
    include_once("conexion.php"); 
    $var_session = $_SESSION['id_usuario'];
    //Consulta para mostrar la informacion del usuario//
    $queryUsuarios = mysqli_query($conn, "SELECT * FROM usuario where id_usuario = $var_session");
    while($mostrar = mysqli_fetch_array($queryUsuarios))
    {
        $idUsuario = $mostrar['id_usuario'];
        $nombreUsuario = $mostrar['nombres'] . ' ' . $mostrar['apellidos'];
    } 
   
 
