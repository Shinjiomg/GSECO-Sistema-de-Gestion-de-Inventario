<?php 
require_once('db.php'); 

class Usuario extends Database
{
	

	public function index()
	{
		$query = $this->pdo->query('SELECT * FROM usuario WHERE estado = 1');
		return $query->fetchAll();
	}

	
}
