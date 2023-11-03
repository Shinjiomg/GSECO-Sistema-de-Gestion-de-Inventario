<?php 
require_once('db.php'); 

class Articulo extends Database
{
	

	public function index()
	{
		$query = $this->pdo->query('SELECT * FROM articulo WHERE estado = 1');
		return $query->fetchAll();
	}

	public function articuloByCategory($category)
	{
		$query = $this->pdo->query('SELECT * FROM articulo WHERE categoria_id_categoria='.$category.'AND estado = 1');
		return $query->fetchAll();
	}

	
}
