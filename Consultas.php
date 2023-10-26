<?php
    session_start();
    include_once("conexion.php"); 
    $var_session = $_SESSION['id_usuario'];
    //Consulta para mostrar la informacion del usuario//
    $queryUsuarios = mysqli_query($conn, "SELECT * FROM usuario where id_usuario = $var_session");
    while($mostrar = mysqli_fetch_array($queryUsuarios))
    {
        $idUsuario = $mostrar['id_usuario'];
        $nombreUsuario = $mostrar['email'];
    } 
    //Consulta para mostrar el Id Asignado con el que se identificara el registros//
    $query= mysqli_query($conn,"SELECT MAX(id_articulo+1) AS id FROM articulo");
    while($ConsultaMax = mysqli_fetch_array($query))
    {
        $varConsultaMax = $ConsultaMax[0];
    }
    //Consulta productos(Tabla index)//
      $queryProductos = mysqli_query($conn, "SELECT * FROM articulo ");
    //Agregar Datos //
    if (isset($_POST['btnAgregar'])) {
      $producto= $_POST['txtNombreProducto'];
      $cantidad= $_POST['txtCantidad'];
	    mysqli_query($conn, "INSERT INTO productos(Nombre,Cantidad,IdUsuarios) VALUES ('$producto',$cantidad,$idUsuario)");
      header('Location:stats.php');
    }
    // Consulta para obtener la suma de registros
    $querySuma = mysqli_query($conn,"SELECT COUNT(id_articulo) AS registros FROM articulo");
    $Fila = mysqli_fetch_assoc($querySuma);
    // Consulta para sumar los registros de la tabla 
    $queryValor = mysqli_query($conn,"SELECT SUM(stock) AS Valores FROM articulo");
    $FilaValor = mysqli_fetch_assoc($queryValor);

?>