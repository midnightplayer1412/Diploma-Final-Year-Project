<?php 
require("fpdf/fpdf.php");
include("../../dataconnection.php");

$pdf = new FPDF('P','mm','A4');
$pdf ->AddPage();
$pdf->SetFont('Times','B',20);

$sql = "SELECT * FROM product";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

class myPDF extends FPDF
{
    function header()
    {
        $this->Image('../img/Bakery logo.jpg',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276.5,'EZWATCH DOCUMENTS',0.0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276.10,'Order Report',0.0,'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0.0,'C');


    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->Output();