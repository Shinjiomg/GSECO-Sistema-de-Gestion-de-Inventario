<?php
require_once('db.php');
date_default_timezone_set('America/Bogota');


class Balance extends Database
{
    public function balance($rango)
    {
        /* ventas */

        $rango =  json_decode($rango);
        $query = $this->pdo->query("SELECT COALESCE(sum(total), 0) as ingresos, DATE(fecha) as fecha  FROM venta WHERE DATE(fecha) BETWEEN'{$rango->start}' AND '{$rango->end}' GROUP BY fecha ORDER BY fecha");
        $total_ventas = $query->fetchAll();

        /* operacionales */
        $query = $this->pdo->query("SELECT COALESCE(sum(total), 0) as operacionales, DATE(fecha) as fecha FROM gastos WHERE categoria_gasto <> 7 AND DATE(fecha)  BETWEEN'{$rango->start}' AND '{$rango->end}' GROUP BY fecha ORDER BY fecha");
        $total_operacionales = $query->fetchAll();

        /* No operacionales */
        $query = $this->pdo->query("SELECT COALESCE(sum(total), 0) as no_operacionales, DATE(fecha) as fecha FROM gastos WHERE categoria_gasto = 7 AND DATE(fecha)  BETWEEN'{$rango->start}' AND '{$rango->end}' GROUP BY fecha ORDER BY fecha");
        $total_no_operacionales = $query->fetchAll();


        $resultados = array(
            'ingresos' => $total_ventas,
            'operacionales' => $total_operacionales,
            'no_operacionales' => $total_no_operacionales
        );

        return $resultados;


    }



}