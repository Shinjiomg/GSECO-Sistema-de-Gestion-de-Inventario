<?php
require_once('db.php');

class Gastos extends Database
{
  

    public function all($id){
    
        $currentDate = date('Y-m-d');
        	
		$query = $this->pdo->query("SELECT * from gastos WHERE id_usuario = " . $id);
		return $query->fetchAll();
	
      
    }


    public function store($descripcion, $total, $id_usuario)
    {

        $query = $this->pdo->prepare('INSERT INTO gastos (descripcion, total, id_usuario ,fecha) VALUES (:descripcion, :total, :id_usuario, :fecha)');


        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':total', $total);
        $query->bindParam(':id_usuario', $id_usuario);
        $query->bindParam(':fecha', date('Y-m-d H:i:s'));
        $query->execute();


       
    }

   








}