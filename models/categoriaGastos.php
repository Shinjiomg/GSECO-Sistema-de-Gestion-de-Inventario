<?php
require_once('db.php');

class CategoriaGastos extends Database
{
  
    public function all($id){
		$query = $this->pdo->query("SELECT * from categoria_gastos");
		return $query->fetchAll();
    }

}