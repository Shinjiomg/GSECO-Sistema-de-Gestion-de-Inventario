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

function store($categoria){
	$query = $this->pdo->prepare('INSERT INTO categoria (nombre) VALUES (:nombre)');

	$query->bindParam(':nombre', $categoria);
	$query->execute();
}
