<?php
require_once('db.php');
date_default_timezone_set('America/Bogota');


class Gastos extends Database
{
  

    public function all($id){
    
        $currentDate = date('Y-m-d');
        	
		$query = $this->pdo->query("SELECT * from gastos WHERE id_usuario = " . $id);
		return $query->fetchAll();
	
      
    }


    public function store($descripcion, $total, $id_usuario, $categoria_gasto)
    {

        $query = $this->pdo->prepare('INSERT INTO gastos (descripcion, total, id_usuario ,fecha, categoria_gasto) VALUES (:descripcion, :total, :id_usuario, :fecha, :categoria_gasto)');

        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':total', $total);
        $query->bindParam(':id_usuario', $id_usuario);
        $query->bindParam(':fecha', date('Y-m-d H:i:s'));
        $query->bindParam(':categoria_gasto', $categoria_gasto);
        $query->execute();

    }

    
	public function gastosPorRango($rango)
	{
		$id_usuario =  $_SESSION['id_usuario'];
		$rol = $_SESSION['rol'];
		$rango =  json_decode($rango);
       
		if ($rol === 2) {
			$query = $this->pdo->query(" SELECT * from gastos WHERE id_usuario = '{$id_usuario}' AND DATE(fecha) BETWEEN '{$rango->start}' AND '{$rango->end}'");
		} else {
			$query = $this->pdo->query(" SELECT * from gastos WHERE DATE(fecha) BETWEEN '{$rango->start}' AND '{$rango->end}'");
		}
		return $query->fetchAll();
	}

}