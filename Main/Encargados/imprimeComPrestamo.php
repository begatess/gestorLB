
<?php
	require '../conexion.php';
	require 'comprobante.php';
	$nombre = $_POST['nameP'];
	$matricula = $_POST['matriculaP'];
	$numero = $_POST['numeroP'];
	$material = $_POST['material'];
	$coment = $_POST['comentarioPrestamo'];
	
	
	$pdf = new PDF('L','mm',array(200,150));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Ln(20);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(70,6,'FOLIO:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,6,"",1,0,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Ln(8);
	$pdf->Cell(70,6,'NOMBRE DEL ALUMNO:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,6,utf8_decode($nombre),1,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(70,6,'MATERIAL:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,6,utf8_decode($material),1,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(70,6,'ESTADO:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,6,utf8_decode($coment),1,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(70,6,'ENTREGA:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,6,"Bertha Erendira",1,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(70,5,'FIRMA DEL ALUMNO:',1,0,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(110,5,"",'B',0,'C');

	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(180,1,'','B',0,'C',1);
	$pdf->Ln(8);
	$pdf->Cell(70,5,'FOLIO:',1,0,'C',1);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(110,5,"",1,0,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Ln(8);
	$pdf->Cell(70,5,'MATERIAL:',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(110,5,utf8_decode($material),1,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(70,5,'ESTADO:',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(110,5,utf8_decode($coment),1,0,'C');
	
	$pdf->Output();
?>
