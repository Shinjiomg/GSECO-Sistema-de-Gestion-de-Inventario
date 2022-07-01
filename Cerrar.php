<?php

session_start();
if (isset($_SESSION['id_usuario'])) {
    session_destroy();
    header('Location:index.php');
}else {
    echo "no hay nada";
}

?>