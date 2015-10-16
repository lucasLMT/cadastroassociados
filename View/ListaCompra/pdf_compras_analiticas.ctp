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
$pdf->Cell(50,8,utf8_decode("Compras por Associado. Mês: ".$referencia));//
$pdf->Ln();
$pdf->SetXY(82,28);
$pdf->Cell(15,7,($date));
$pdf->Ln(22);
// Column headings
$header = array(utf8_decode('Matrícula'),utf8_decode('Descrição'),
                utf8_decode('Convênio'), 'Valor', utf8_decode('Observação'));
// Column widths
$w = array(20,82,40,23,25);
// Associado
$pdf->Cell(0,7,utf8_decode("Associado: ".$compras[0]['Associado']['nome']),1,0,'C');
$pdf->Ln();
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
  $pdf->Cell($w[0],7,$compra['Associado']['matricula'],1,0,'C');
  $pdf->Cell($w[1],7,utf8_decode($compra['Compra']['descricao']),1);
  $pdf->Cell($w[2],7,utf8_decode($compra['Convenio']['razaoSocial']),1);
  $pdf->Cell($w[3],7,("R$".$compra['Compra']['valor']),1,0,'C');
  $pdf->Cell($w[4],7,utf8_decode($compra['Compra']['observacao']),1);
  $pdf->Ln();
}
$pdf->Cell(0,7,utf8_decode("Total: R$".$total),1,0,'R');

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true);
$pdf->SetY(-266);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo().'/{nb}',0,0,'R');

$pdf->Output('ComprasPorAssociado.pdf','D')
?>
