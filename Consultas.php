<?php
    session_start();
    include_once("conexion.php"); 
    $var_session = $_SESSION['id_usuario'];
    //Consulta para mostrar la informacion del usuario//
    $queryUsuarios = mysqli_query($conn, "SELECT * FROM usuario where id = $var_session");
    while($mostrar = mysqli_fetch_array($queryUsuarios))
    {
        $idUsuario = $mostrar['id'];
        $nombreUsuario = $mostrar['email'];
    } 
    //Consulta para mostrar el Id Asignado con el que se identificara el registros//
    $query= mysqli_query($conn,"SELECT MAX(id_Producto+1) AS id FROM productos");
    while($ConsultaMax = mysqli_fetch_array($query))
    {
        $varConsultaMax = $ConsultaMax[0];
    }
    //Consulta productos(Tabla index)//
      $queryProductos = mysqli_query($conn, "SELECT * FROM productos WHERE IdUsuarios = $var_session");
    //Agregar Datos //
    if (isset($_POST['btnAgregar'])) {
      $producto= $_POST['txtNombreProducto'];
      $cantidad= $_POST['txtCantidad'];
	    mysqli_query($conn, "INSERT INTO productos(Nombre,Cantidad,IdUsuarios) VALUES ('$producto',$cantidad,$idUsuario)");
      header('Location:inicio.php');
    }
    // Consulta para obtener la suma de registros
    $querySuma = mysqli_query($conn,"SELECT COUNT(id_Producto) AS registros FROM productos WHERE IdUsuarios = $var_session");
    $Fila = mysqli_fetch_assoc($querySuma);
    // Consulta para sumar los registros de la tabla 
    $queryValor = mysqli_query($conn,"SELECT SUM(Cantidad) AS Valores FROM productos WHERE IdUsuarios = $var_session");
    $FilaValor = mysqli_fetch_assoc($queryValor);

?>