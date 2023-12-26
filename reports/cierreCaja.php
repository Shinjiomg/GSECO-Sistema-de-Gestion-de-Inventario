<?php
require('../fpdf/fpdf.php');
require('../models/venta.php');
include_once("../Consultas.php");




$venta = new Venta();
$cierre = $venta->cierreCaja($var_session);


class pdf extends FPDF
{
	public function header()
	{


		$this->SetFillColor(57, 38, 107);
		$this->Rect(0, 0, 220, 50, 'F');
		$this->SetY(20);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255, 255, 255);
		$this->Write(-20, 'Tienda del soldado GSECO');
		$this->Ln();
		$this->Write(45, 'CIERRE DE CAJA');
		$this->Ln();
		$this->SetFont('Arial', 'I', 20);
		$this->Image('../img/logo.png', 150, 2, 60, 50);
		$this->Ln();
		$this->SetFont('Arial', 'I', 10);
		$this->Ln();
		$this->Write(90, 'jose.jairo.fuentes@gmail.com');
		$this->Ln();
		$this->Write(-80, '123-456-7890');
	}

	public function footer()
	{
		$this->SetFillColor(57, 38, 107);
		$this->Rect(0, 260, 220, 20, 'F');
	}
}

$fpdf = new pdf('P', 'mm', 'letter', true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetMargins(10, 30, 20, 20);
$fpdf->SetFont('Arial', 'I', 12);
$fpdf->SetTextColor(0, 0, 0);




$fpdf->SetFillColor(0, 0, 0);
$fpdf->SetY(60);
$fpdf->SetX(10);
$fpdf->Write(5, 'Fecha:');
$fpdf->SetX(25);
$fechaFormateada = date("d/m/Y H:i");
$fpdf->Write(5, $fechaFormateada);
$fpdf->Ln();
$fpdf->Ln();

$fpdf->Write(5, 'Cajero: ');
$nombreCompleto = ucwords($nombreUsuario);
$fpdf->Write(5, $nombreCompleto);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->SetFillColor(57, 38, 107);
$fpdf->Cell(30, 10, 'VENTAS', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'INGRESOS', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'GASTOS', 0, 0, 'C', 1);
$fpdf->Cell(60, 10, 'DISPONIBLE (EFECTIVO - GASTOS)', 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetFillColor(255, 255, 255);
foreach ($cierre as $v) {
	$fpdf->Cell(30, 10, '$ ' . number_format($v->ventas, 0, '.', ','), 0, 0, 'C', 1);
	$fpdf->Cell(30, 10, '$ ' . number_format($v->ingresos, 0, '.', ','), 0, 0, 'C', 1);
	$fpdf->Cell(30, 10, '$ ' . number_format($v->gastos, 0, '.', ','), 0, 0, 'C', 1);
	$fpdf->Cell(60, 10, '$ ' . number_format(($v->ventas) - ($v->ingresos + $v->gastos), 0, '.', ','), 0, 0, 'C', 1);

	$fpdf->Ln();
}


$fpdf->OutPut();
