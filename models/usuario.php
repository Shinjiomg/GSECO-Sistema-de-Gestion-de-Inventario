<?php
require_once('db.php');
date_default_timezone_set('America/Bogota');

class Usuario extends Database
{


	public function index()
	{
		$query = $this->pdo->query('SELECT * FROM usuario WHERE estado = 1');
		return $query->fetchAll();
	}

	public function logout(){
		session_start();
		session_destroy();
	}

	public function authenticated($credentials)
	{
		$credentials = json_decode($credentials);

		if ($credentials->user === null || $credentials->user === '' || $credentials->password === null ||  $credentials->password === '') {
			return 0;
		}

		try {

			$query = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email AND user_password = :pass");

			$query->bindParam(':email', $credentials->user);
			$query->bindParam(':pass', $credentials->password);

			$query->execute();
			if ($query->rowCount() > 0) {
	
				$user = $query->fetch(PDO::FETCH_ASSOC);
	
				// Start or resume the session
				session_start();
	
				// Store user information in the session
				$_SESSION['nombredelusuario'] = $credentials->user;
				$_SESSION['id_usuario'] = $user['id_usuario'];
				$_SESSION['rol'] = $user['rol_id_rol'];
				if (intval($user['rol_id_rol']) == 1) {
					/* header("location: ../stats.php"); */
					return 1;
				} else {
					/* header("location: ../sales.php"); */
					return 2;
				}
			} else {
				return 0;
			}
		} catch (PDOException $e) {
			return 0;
			echo 'Error: ' . $e->getMessage();
		}

	}
}
