<?php 
require_once('db.php'); 

class Venta extends Database
{
	

	public function ventas($id)
	{
		$query = $this->pdo->query('SELECT sum(total) as total_diario FROM venta WHERE Usuario_id_usuario ='.$id);
		return $query->fetch();
	}
	public function ultimaVenta($id)
	{
		$query = $this->pdo->query('SELECT * FROM venta WHERE Usuario_id_usuario ='.$id.' order by fecha desc limit 1');
		return $query->fetch();
	}

	
}
