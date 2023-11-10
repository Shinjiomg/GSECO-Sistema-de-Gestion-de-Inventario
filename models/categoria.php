<?php 
require_once('db.php'); 

class Categoria extends Database
{
	
	public function index()
	{
		$query = $this->pdo->query('SELECT * FROM categoria WHERE estado = 1');
		return $query->fetchAll();
	}

	public function show($id){
		$query = $this->pdo->query('SELECT * FROM categoria WHERE id_categoria = '.$id);
		return $query->fetch();
	}

	function store($categoria){
		$query = $this->pdo->prepare('INSERT INTO categoria (nombre) VALUES (:nombre)');
	
		$query->bindParam(':nombre', $categoria);
		$query->execute();

		$lastInsertId = $this->pdo->lastInsertId();
		return $this->show($lastInsertId);
	}
	
	
}

