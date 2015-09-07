<?php
//Adicionando página
$pdf->AddPage();
//Cabeçalho
$logo = "img/report.png";
$pdf->Cell(0,40,"",1,1,'C'); // Célula do cabeçalho
$pdf->Image($logo,16,18,60);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(60,10);
$pdf->Cell(50,15,utf8_decode("AFSEBRAE - Associação dos funcionários do SEBRAE\CE"));
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(90,20);
$pdf->Cell(50,10,utf8_decode("Compras por convênio sintético."));
$pdf->Ln(30);

// Column headings
$header = array(utf8_decode('Convênio'),'Total');
// Column widths
$w = array(175,15);
// Header
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();

/*// Header
foreach($header as $col)
    $pdf->Cell(60,10,$col,1);
$pdf->Ln();*/

// Data
foreach($conveniosArray as $convenio)
{
  $pdf->Cell($w[0],8,utf8_decode($convenio['convenio']),1);
  $pdf->Cell($w[1],8,$convenio['total'],1,0,'C');
  $pdf->Ln();
}

/*$pdf->AddPage();
//Cabeçalho
$pdf->Cell(0,40,"",1,1,'C'); // Célula do cabeçalho
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(60,10);
$pdf->Cell(50,15,"AFSEBRAE - Associacao dos funcionarios do SEBRAE\CE");
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(90,20);
$pdf->Cell(50,10,"Compras por convenio sintetico.");
$pdf->Ln(30);
// Column widths
$w = array(175,15);
// Header
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();
// Data
foreach($conveniosArray as $convenio)
{
  $pdf->Cell($w[0],8,$convenio['convenio'],'LR');
  $pdf->Cell($w[1],8,number_format($convenio['total']),'LR',0,'C');
  $pdf->Ln();
}
// Closing line
$pdf->Cell(array_sum($w),0,'','T');
*/

// Position at 1.5 cm from bottom
$pdf->SetY(-265);
// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Page number
$pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo(),0,0,'C');

$pdf->Output('ConvenioSinteticos.pdf','D');
?>
