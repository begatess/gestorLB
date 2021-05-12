<?php
	require('C:/xampp/htdocs/gestorLB/fpdf/fpdf.php');
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('C:/xampp/htdocs/gestorLB/img/logoFCC.png', 10, 5, 0 );
			$this->SetFont('Arial','B',14);
			$this->Cell(200,20, 'Facultad de ciencias de la computacion',0,0,'C');
			$this->Ln(8);
            $this->Cell(200,20, 'Comprobante de prestamos de material',0,0,'C');
			$this->Ln(8);
		}
		
	}
?>

