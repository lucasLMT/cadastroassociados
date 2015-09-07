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
$pdf->Cell(50,10,utf8_decode("Compras analíticas por convênio."));
$pdf->Ln(30);

// Column headings
$header = array(utf8_decode('Matrícula'),'Associado',utf8_decode('Convênio'), 'Valor');
// Column widths
$w = array(30,95,50,15);
// Header
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();

/*// Header
foreach($header as $col)
    $pdf->Cell(60,10,$col,1);
$pdf->Ln();*/

// Data
foreach($compras as $compra)
{
  $pdf->Cell($w[0],8,$compra['Associado']['matricula'],1,0,'C');
  $pdf->Cell($w[1],8,utf8_decode($compra['Associado']['nome']),1);
  $pdf->Cell($w[2],8,utf8_decode($compra['Convenio']['nomeDoGrupo']),1);
  $pdf->Cell($w[3],8,$compra['Compra']['valor'],1,0,'C');
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
$pdf->Cell(50,10,"Compras analiticas por convenio.");
$pdf->Ln(30);
// Column widths
$w = array(30,95,50,15);
// Header
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();
// Data
foreach($compras as $compra)
{
  $pdf->Cell($w[0],8,$compra['Associado']['matricula'],'LR',0,'C');
  $pdf->Cell($w[1],8,$compra['Associado']['nome'],'LR');
  $pdf->Cell($w[2],8,$compra['Convenio']['nomeDoGrupo'],'LR');
  $pdf->Cell($w[3],8,number_format($compra['Compra']['valor']),'LR',0,'C');
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

$pdf->Output('ConveniosAnaliticos.pdf','D');
?>
