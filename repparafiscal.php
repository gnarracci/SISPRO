<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
    // Logo
    $this->Image('imagenes/titletcv.png',10,8,70);
     // Salto de l�nea
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // T�tulo
    $this->Cell(75,10,'Reporte Parafiscal',0,0,'L');
    // Salto de l�nea
    $this->Ln(20);
}

// Pie de p�gina
function Footer()
{
    // Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // N�mero de p�gina
    $this->Cell(0,10,'P�gina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo l�nea n�mero '.$i,0,1);
$pdf->Output();
?>