<?php
session_start();
if(isset($_POST['btningresar']))
{
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="sistema_inventario";
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	$Usuario=$_POST['txtusuario'];
	$Contraseña=$_POST['txtpassword'];
	$query = mysqli_query($conn,"Select * from usuario where email = '$Usuario' and password = '$Contraseña'");
	$nr=mysqli_num_rows($query);
	if($nr != 0){
        while($row=mysqli_fetch_array($query)) {
            if($Usuario == $row['email'] && $Contraseña == $row['password'])
            {
		        $_SESSION['nombredelusuario']=$Usuario;
                $_SESSION['id_usuario']=$row['id'];
		        header("location:inicio.php");
            }
	}
	} else { 
        echo "<script>alert('correo y/o contraseña no coinciden');window.location= 'index.php' </script>"; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">BIENVENIDO</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
           		   		<input type="email" name="txtusuario" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" name="txtpassword" class="input">
            	   </div>
            	</div>
            	<input type="submit" name= "btningresar" class="btn" value="Iniciar Sesión">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>


















