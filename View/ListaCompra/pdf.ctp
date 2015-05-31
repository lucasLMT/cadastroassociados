<?php
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','',10);
    //debug($compras);
    $fpdf->Cell(90,4,'Compras',1,0,'C');
    $fpdf->Cell(40);
    $fpdf->Ln(10);
    foreach($compras as $compra){
      $fpdf->Cell(30,4,$compra['Associado']['nome'],1,0,'C');
      $fpdf->Cell(30,4,$compra['Convenio']['nomeDoGrupo'],1,0,'C');
      $fpdf->Cell(30,4,$compra['Compra']['valor'],1,0,'C');
      $fpdf->Ln(4);
    }
    $fpdf->Ln(10);
    $fpdf->Output('test.pdf','D');
?>
