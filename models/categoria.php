<?php 
require_once('db.php'); 

class Categoria extends Database
{
	
	public function index()
	{
		$query = $this->pdo->query('SELECT * FROM categoria WHERE estado = 1');
		return $query->fetchAll();
	}

	
	
}
