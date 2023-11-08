<?php
require_once('db.php');

class Venta extends Database
{


	public function ventas($id)
	{
		$query = $this->pdo->query('SELECT sum(total) as total_diario FROM venta WHERE Usuario_id_usuario =' . $id);
		return $query->fetch();
	}

	public function store($idUsuario, $total, $productos, $tipoPago)
	{

		$query = $this->pdo->prepare('INSERT INTO venta (Usuario_id_usuario, total, fecha, tipo_pago) VALUES (:usuario_id, :total, :fecha, :tipo_pago)');


		$query->bindParam(':usuario_id', $idUsuario);
		$query->bindParam(':total', $total);
		$query->bindParam(':fecha', date('Y-m-d H:i:s'));
		$query->bindParam(':tipo_pago', $tipoPago);
		$query->execute();


		if ($query->rowCount() > 0) {
			echo "Se guardo.";
			$id_venta = $this->pdo->lastInsertId();
			$productos = json_decode($productos);
			foreach ($productos as $articulo) {
				$this->insertDetalleVenta($id_venta, $articulo->id_articulo, $articulo->cantidad, $articulo->precio_venta);
				$this->discountProduct($articulo->id_articulo, $articulo->cantidad);
			}
		} else {

			echo "Error en la inserción.";
		}
	}

	public function discountProduct($id_articulo, $cantidad)
	{

		$query = $this->pdo->prepare("UPDATE articulo SET stock = stock - $cantidad WHERE id_articulo = $id_articulo");
		$query->execute();
	}



	public function insertDetalleVenta($id_venta, $id_articulo, $cantidad, $precio)
	{

		$query = $this->pdo->prepare('INSERT INTO detalle_venta (Venta_id_venta, Articulo_id_articulo, cantidad, precio) VALUES (:id_venta, :id_articulo, :cantidad, :precio)');


		$query->bindParam(':id_venta', $id_venta);
		$query->bindParam(':id_articulo', $id_articulo);
		$query->bindParam(':cantidad', $cantidad);
		$query->bindParam(':precio', $precio);
		$query->execute();


		if ($query->rowCount() > 0) {
			echo "Se guardo correctamente";
		} else {

			echo "Error en la inserción.";
		}
	}



	public function ultimaVenta($id)
	{
		$currentDate = date('Y-m-d');
		/* $query = $this->pdo->query('SELECT * FROM venta WHERE Usuario_id_usuario ='.$id.' order by fecha desc limit 1'); */
		/* $query = $this->pdo->query("SELECT SUM(total) as total_diario FROM venta WHERE Usuario_id_usuario = {$id} AND DATE(fecha) = '{$currentDate}'"); */
		$query = $this->pdo->query("SELECT SUM(total) as total_diario, 
    	(SELECT total FROM venta WHERE Usuario_id_usuario = {$id} AND DATE(fecha) = '{$currentDate}' ORDER BY fecha DESC LIMIT 1) as ultima_venta,
    	(SELECT SUM(total) FROM venta  WHERE Usuario_id_usuario = {$id}  AND DATE(fecha) BETWEEN DATE_SUB('{$currentDate}', INTERVAL 30 DAY) AND '{$currentDate}') as total_ultimo_mes FROM venta WHERE Usuario_id_usuario = {$id} AND DATE(fecha) = '{$currentDate}'");
		return $query->fetch();
	}

	public function facturas($id_usuario)
	{
		$currentDate = date('Y-m-d');

		$query = $this->pdo->query("SELECT venta.id_venta,  DATE_FORMAT(venta.fecha, '%d-%m-%Y') AS fecha_venta, GROUP_CONCAT(articulo.nombre SEPARATOR ', ') AS nombres_productos, ROUND(venta.total) AS total, venta.tipo_pago
    FROM venta 
    JOIN detalle_venta ON venta.id_venta = detalle_venta.Venta_id_venta 
    JOIN articulo ON detalle_venta.Articulo_id_articulo = articulo.id_articulo
    WHERE venta.Usuario_id_usuario = {$id_usuario} AND DATE(venta.fecha) = '{$currentDate}'
    GROUP BY venta.id_venta");
		return $query->fetchAll();
	}

	public function transacciones($id_usuario)
	{
		$currentDate = date('Y-m-d');
		$query = $this->pdo->query("SELECT SUM(total) as total_diario FROM venta WHERE Usuario_id_usuario = {$id_usuario} AND DATE(fecha) = '{$currentDate}' GROUP BY tipo_pago");
		return $query->fetchAll();
	}
}
