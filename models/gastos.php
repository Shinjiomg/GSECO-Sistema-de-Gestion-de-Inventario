<?php
require_once('db.php');

class Gastos extends Database
{
  

    public function index($id){
        $currentDate = date('Y-m-d');
        $query = $this->pdo->prepare("SELECT FROM gastos WHERE id_usuario = {$id} AND DATE(fecha) = '{$currentDate}'");
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