<?php
//Adicionando página
$pdf->AddPage();
//Cabeçalho
$date = date("d/m/Y");
$logo = "img/report.png";
$pdf->Cell(0,40,"",1,1,'C'); // Célula do cabeçalho
$pdf->Image($logo,16,18,60);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(60,10);
$pdf->Cell(50,13,utf8_decode("AFSEBRAE - Associação dos Funcionários do SEBRAE\CE"));
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(82,20);
$pdf->Cell(50,8,utf8_decode("Compras Sintéticas por Associado. Mês: ".$referencia));
$pdf->Ln();
$pdf->SetXY(82,28);
$pdf->Cell(15,7,($date));
$pdf->Ln(22);

// Column headings
$header = array(utf8_decode('Associado'),'Total');
// Column widths
$w = array(155,35);
// Header
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],6,$header[$i],1,0,'C');
$pdf->Ln();
/*// Header
foreach($header as $col)
    $pdf->Cell(60,10,$col,1);
$pdf->Ln();*/

// Data
$assoc_tmp = $compras[0]['Associado']['nome'];
$count = Count($compras);
$total = 0;
$i = 1;
foreach ($compras as $compra):
  if (($assoc_tmp <> $compra['Associado']['nome']) || ($count == $i)) {
    if ($count == $i && $assoc_tmp == $compra['Associado']['nome'])
	  $total += $compra['Compra']['valor'];

  $pdf->Cell($w[0],6,utf8_decode($assoc_tmp),1);
  $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
  $total = $this->Number->currency($total,'BRL' );
  $pdf->Cell($w[1],6,($total),1,0,'C');
  $pdf->Ln();

  $total = $compra['Compra']['valor'] + 0;
  if (($assoc_tmp <> $compra['Associado']['nome']) && ($count == $i)) {

    $pdf->Cell($w[0],6,utf8_decode($compra['Associado']['nome']),1);
    $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
		$total = $this->Number->currency($total,'BRL' );
    $pdf->Cell($w[1],6,($total),1,0,'C');
    $pdf->Ln();
  }
  $assoc_tmp = $compra['Associado']['nome'];
} else {
    $total += $compra['Compra']['valor'];
}
$i++;
endforeach;

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true);
$pdf->SetY(-266);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo().'/{nb}',0,0,'R');

$pdf->Output('ComprasSinteticas.pdf','D');
?>
