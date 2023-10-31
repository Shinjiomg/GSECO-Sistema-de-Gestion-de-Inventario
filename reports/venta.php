<?php
require('../fpdf/fpdf.php');
require('../models/model.php');
$nw = new Northwind();
$id = 1;
class pdf extends FPDF
{
	public function header()
	{
		$this->SetFillColor(2, 178,236);
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(25);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(5, 'Factura de venta');
		$this->Image('../img/logo.png', 160, 15,30,30);

	}

	public function footer()
	{
		$this->SetFillColor(253, 135,39);
		$this->Rect(0, 250, 220, 50, 'F');
		$this->SetY(-20);
		$this->SetFont('Arial', '', 12);
		$this->SetTextColor(255,255,255);
		$this->SetX(120);
		$this->Write(5, 'Tienda del soldado GSECO');
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, 'jose.jairo.fuentes@gmail.com');
		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, '+(503)7889-8787');
	}
}

$fpdf = new pdf('P','mm','letter',true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial', '', 12);
$fpdf->SetTextColor(0,0,0);
$order = $nw->getOrder($id);

$order_details = $nw->getOrderDetails($id);

$fpdf->SetFillColor(0,0,0);
$fpdf->SetY(60);
$fpdf->SetX(10);
$fpdf->Write(5, 'Fecha:');
$fpdf->SetX(25);
$fpdf->Write(5, $order->fecha);
$fpdf->SetX(130);
$fpdf->Write(5, 'Cajero:');
$fpdf->SetX(145);
$fpdf->Write(5, $order->nombre_completo);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->SetX(130);
$fpdf->Write(5, 'Total:');
$fpdf->SetX(145);
$fpdf->Write(5, $order->total);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(60, 10, 'PRODUCTO', 0, 0, 'C', 1);
$fpdf->Cell(60, 10, 'DESCRIPCION', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'P. UNITARIO', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'CANTIDAD', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'SUBTOTAL', 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
foreach($order_details as $detail)
{
	$fpdf->Cell(60, 10, $detail->nombre, 0, 0, 'C', 1);
	$fpdf->Cell(60, 10, $detail->descripcion, 0, 0, 'C', 1);
	$fpdf->Cell(20, 10, $detail->precio, 0, 0, 'C', 1);
	$fpdf->Cell(20, 10, $detail->cantidad, 0, 0, 'C', 1);
	$fpdf->Cell(30, 10, $detail->cantidad * $detail->precio, 0, 0, 'C', 1);
/* 	$fpdf->Cell(60, 10, $detail->product_name, 0, 0, 'C', 1);
	$fpdf->Cell(60, 10, $detail->description, 0, 0, 'C', 1);
	$fpdf->Cell(20, 10, $detail->unit_price, 0, 0, 'C', 1);
	$fpdf->Cell(20, 10, $detail->quantity, 0, 0, 'C', 1);
	$fpdf->Cell(30, 10, $detail->uni_price * $detail->quantity, 0, 0, 'C', 1); */
	$fpdf->Ln();
}
$fpdf->OutPut();