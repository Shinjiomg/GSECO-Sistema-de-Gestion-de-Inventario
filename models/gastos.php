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

    
	public function ventasPorRango($rango)
	{
		$id_usuario =  $_SESSION['id_usuario'];
		$rol = $_SESSION['rol'];
		$rango =  json_decode($rango);
       
        $query = $this->pdo->query(" SELECT * from gastos WHERE id_usuario = '{$id_usuario}' AND DATE(fecha) BETWEEN '{$rango->start}' AND '{$rango->end}'");

		/* if ($rol === 2) {
			
			$query = $this->pdo->query("SELECT  COALESCE(SUM(venta.total),0)as total_venta, usuario.nombres, usuario.apellidos, usuario.id_usuario FROM venta JOIN usuario on venta.Usuario_id_usuario = usuario.id_usuario  WHERE venta.Usuario_id_usuario = {$id_usuario} AND DATE(venta.fecha) BETWEEN '{$rango->start}' AND '{$rango->end}'");
		} else {
			
			$query = $this->pdo->query("SELECT COALESCE(SUM(venta.total),0) as total_venta, usuario.nombres, usuario.apellidos FROM venta
				JOIN usuario on venta.Usuario_id_usuario = usuario.id_usuario WHERE  DATE(venta.fecha) BETWEEN '{$rango->start}' AND '{$rango->end}'");
		} */
		return $query->fetchAll();
	}

}