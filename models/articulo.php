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
		$query = $this->pdo->query('SELECT * FROM articulo where categoria_id_categoria =' . $category . ' AND estado = 1');
		return $query->fetchAll();
	}

	public function show($id_articulo)
	{
		$query = $this->pdo->query('SELECT * FROM articulo where id_articulo =' . $id_articulo);
		return $query->fetch();
	}
	public function editProduct($product)
	{
		$editProduct = json_decode($product);
		$updateQuery = $this->pdo->prepare('UPDATE articulo SET nombre = :nombre, precio_venta = :precio_venta, stock = :stock, categoria_id_categoria = :categoria_id_categoria, stock_deseado = :stock_deseado  WHERE id_articulo = :id');

		// Reemplaza "columna1", "columna2", etc. con los nombres reales de tus columnas y :valor1, :valor2 con los valores actualizados.
		$updateQuery->bindParam(':nombre', $editProduct->nombre);
		$updateQuery->bindParam(':precio_venta', $editProduct->precio);
		$updateQuery->bindParam(':stock', $editProduct->cantidad);
		/* $updateQuery->bindParam(':descripcion', $editProduct->descripcion); */
		$updateQuery->bindParam(':categoria_id_categoria', $editProduct->selectCategoria);
		$updateQuery->bindParam(':stock_deseado', $editProduct->stockMaximo);

		$updateQuery->bindParam(':id', $editProduct->id_articulo);

		// Ejecuta la consulta UPDATE
		$updateQuery->execute();
	}
}
