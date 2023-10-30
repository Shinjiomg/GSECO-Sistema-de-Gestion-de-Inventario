<?php 
require_once('db.php'); 

class Northwind extends Database
{
	/* public function getCustomer(int $id)
	{
		$query = $this->pdo->query('SELECT * FROM customers WHERE id = '.$id);
		return $query->fetch();
	} */

	public function getOrder(int $id)
	{
		$query = $this->pdo->query('SELECT * FROM venta WHERE id_venta = '.$id);
	
		return $query->fetch();
	}

	public function getOrderDetails(int $id)
	{
		$query = $this->pdo->query('SELECT Articulo_id_articulo, cantidad, precio
				FROM detalle_venta
				JOIN articulo ON articulo.id_articulo = Articulo_id_articulo
				WHERE detalle_venta.Venta_id_venta = '.$id);
		return $query->fetchAll();
	}
}
