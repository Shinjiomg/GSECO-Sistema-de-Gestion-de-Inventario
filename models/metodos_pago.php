<?php
require_once('db.php');

class MetodosPago extends Database
{


	public function index()
	{
		$query = $this->pdo->query('SELECT * from  metodos_pago');
		return $query->fetchAll();
	}
}