

<?php
require_once "../models/usuario.php";


if(isset($_POST["credentials"])){

	$usuario = new Usuario();

	$credential= $_POST["credentials"];
    
    echo json_encode( $usuario->authenticated($credential));

}

?>