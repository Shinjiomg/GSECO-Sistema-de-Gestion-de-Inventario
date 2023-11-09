<?php 
require_once('db.php'); 

class Articulo extends Database
{
	

	public function index()
	{
		$query = $this->pdo->query('SELECT articulo.*, categoria.nombre as categoria FROM articulo
		join categoria on categoria.id_categoria = 	categoria_id_categoria  WHERE articulo.estado = 1');
		return $query->fetchAll();
	}

	public function articuloByCategory($category)
	{
		$query = $this->pdo->query('SELECT * FROM articulo where categoria_id_categoria ='.$category.' AND estado = 1');
		return $query->fetchAll();
	}

	public function show($id_articulo){
		$query = $this->pdo->query('SELECT * FROM articulo where id_articulo ='.$id_articulo);
		return $query->fetch();

	}

	
}
