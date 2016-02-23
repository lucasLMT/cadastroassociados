<?php
//Adicionando página
$pdf->AddPage();

//Cabeçalho
$pdf->Cell(0, 40, "", 1, 1, 'C'); // Célula do cabeçalho
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(70, 10);
$pdf->Cell(50, 15, "AFSEBRAE - Associacao dos funcionarios do SEBRAE\CE");
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(110, 20);
$pdf->Cell(50, 10, "Compras por associado sintetico.");
$pdf->Ln(30);

// Column headings
$header = array('Associado', 'Total');
// Column widths
$w = array(175, 15);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
/*// Header
foreach($header as $col)
    $pdf->Cell(60,10,$col,1);
$pdf->Ln();*/
// Data
foreach ($associadosArray as $associado) {
    $pdf->Cell($w[0], 8, $associado['associado'], 1);
    $pdf->Cell($w[1], 8, $associado['total'], 1, 0, 'C');
    $pdf->Ln();
}

$pdf->AddPage();
//Cabeçalho
$pdf->Cell(0, 40, "", 1, 1, 'C'); // Célula do cabeçalho
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(70, 10);
$pdf->Cell(50, 15, "AFSEBRAE - Associacao dos funcionarios do SEBRAE\CE");
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(110, 20);
$pdf->Cell(50, 10, "Compras por associado sintetico.");
$pdf->Ln(30);
// Column widths
$w = array(175, 15);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data
foreach ($associadosArray as $associado) {
    $pdf->Cell($w[0], 8, $associado['associado'], 'LR');
    $pdf->Cell($w[1], 8, number_format($associado['total']), 'LR', 0, 'C');
    $pdf->Ln();
}
// Closing line
$pdf->Cell(array_sum($w), 0, '', 'T');

$pdf->Output('test.pdf', 'D');
?>
