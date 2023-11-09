<?php
session_start();
if (isset($_POST['btningresar'])) {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "sistema_inventario";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$Usuario = $_POST['txtusuario'];
	$Contraseña = $_POST['txtpassword'];
	$query = mysqli_query($conn, "Select * from usuario where email = '$Usuario' and password = '$Contraseña'");
	$nr = mysqli_num_rows($query);
	if ($nr != 0) {
		while ($row = mysqli_fetch_array($query)) {
			if ($Usuario == $row['email'] && $Contraseña == $row['password']) {
				$_SESSION['nombredelusuario'] = $Usuario;
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['rol'] = $row['rol_id_rol'];
				if (intval($row['rol_id_rol']) == 1) {
					header("location:stats.php");
				} else {
					header("location:sales.php");
				}
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
	<title>test</title>
	<link rel="stylesheet" href="./css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
	<div class="container">
		<div class="contenedor">
			<h2 class="tituloempresa">TIENDA DEL SOLDADO</h2>
			<div class="img">
				<img src="img/logo.png">
			</div>
			<div class="login-content">
				<form method="POST">
					<h3 class="titulo" id="titulo1">GSECO</h3>
					<h3 class="titulo" id="titulo3">Iniciar Sesión</h3>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Correo Electrónico</h5>
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
					<div class="btnpos"><input type="submit" class="btn" name="btningresar" value="Ingresar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>