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
$pdf->Cell(50,8,utf8_decode("Todas as Compras Analíticas por Associados. Mês: ".$referencia));
$pdf->Ln();
$pdf->SetXY(82,28);
$pdf->Cell(15,7,($date));
$pdf->Ln(22);

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,4);
//$pdf->SetY(266);
//$pdf->SetFont('Arial','I',8);
//$pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo().'/{nb}',0,0,'R');


// Column headings
$header = array(utf8_decode('Convênio'),
 								'Valor', utf8_decode('Descrição'));
// Column widths
$w = array(100,25,65);
// Header
//for($i=0;$i<count($header);$i++)
//    $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
//$pdf->Ln();

// Data
$assoc_tmp = $compras[0]['Associado']['nome'];
$count = Count($compras);
$i = 1;
$total = 0;
foreach($compras as $compra){
  $last_iteration = !(--$count); //boolean true/false
	if($assoc_tmp == $compra['Associado']['nome']){
    if(($i <> $count) && ($total == 0)){
      $pdf->Cell(0,6,utf8_decode($compra['Associado']['matricula']." - ".$compra['Associado']['nome']),1,0,'L');
      $pdf->Ln();
      for($i=0;$i<count($header);$i++)
          $pdf->Cell($w[$i],6,$header[$i],1,0,'C');
      $pdf->Ln();
      //$pdf->Cell($w[0],7,$compra['Associado']['matricula'],1,0,'C');
      //$pdf->Cell($w[0],6,utf8_decode($compra['Compra']['descricao']),1);
      $pdf->Cell($w[0],6,utf8_decode($compra['Convenio']['razaoSocial']),1);
			$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
		  $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );
			$pdf->Cell($w[1],6,($valor),1,0,'C');
      $pdf->Cell($w[2],6,utf8_decode($compra['Compra']['descricao']),1);
      $pdf->Ln();
      $total += (float)$compra['Compra']['valor'];

    } elseif (($i <> $count) && ($total <> 0)){
        //$pdf->Cell($w[0],7,$compra['Associado']['matricula'],1,0,'C');
        //$pdf->Cell($w[0],6,utf8_decode($compra['Compra']['descricao']),1);
        $pdf->Cell($w[0],6,utf8_decode($compra['Convenio']['razaoSocial']),1);
				$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
			  $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );
				$pdf->Cell($w[1],6,($valor),1,0,'C');
        $pdf->Cell($w[2],6,utf8_decode($compra['Compra']['descricao']),1);
        $pdf->Ln();
        $total += (float)$compra['Compra']['valor'];

    } elseif ($i == $count)  {
        //$pdf->Cell($w[0],7,$compra['Associado']['matricula'],1,0,'C');
        //$pdf->Cell($w[0],6,utf8_decode($compra['Compra']['descricao']),1);
        $pdf->Cell($w[0],6,utf8_decode($compra['Convenio']['razaoSocial']),1);
				$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
			  $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );
				$pdf->Cell($w[1],6,($valor),1,0,'C');
        $pdf->Cell($w[2],6,utf8_decode($compra['Compra']['descricao']),1);
        $pdf->Ln();
        $total += (float)$compra['Compra']['valor'];
				$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
				$total = $this->Number->currency($total,'BRL' );
				$pdf->Cell(0,6,utf8_decode("Total: ".$total),1,0,'R');
        $pdf->Ln();
    };
  };
  if($assoc_tmp <> $compra['Associado']['nome']){
		$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
		$total = $this->Number->currency($total,'BRL' );
		$pdf->Cell(0,6,utf8_decode("Total: ".$total),1,0,'R');
    $pdf->Ln();
    $assoc_tmp = $compra['Associado']['nome'];
    $total = 0;

		$pdf->Cell(0,6,utf8_decode($compra['Associado']['matricula']." - ".$compra['Associado']['nome']),1,0,'L');
		$pdf->Ln();
		for($i=0;$i<count($header);$i++)
				$pdf->Cell($w[$i],6,$header[$i],1,0,'C');
		$pdf->Ln();
		//$pdf->Cell($w[0],7,$compra['Associado']['matricula'],1,0,'C');
		//$pdf->Cell($w[0],6,utf8_decode($compra['Compra']['descricao']),1);
		$pdf->Cell($w[0],6,utf8_decode($compra['Convenio']['razaoSocial']),1);
		$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
		$valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );
		$pdf->Cell($w[1],6,($valor),1,0,'C');
		$pdf->Cell($w[2],6,utf8_decode($compra['Compra']['descricao']),1);
		$pdf->Ln();
		$total += (float)$compra['Compra']['valor'];

		if($last_iteration){
			$this->Number->addFormat('BRL', array('before'=> '', 'thousands' => '.', 'decimals' => ','));
			$total = $this->Number->currency($total,'BRL' );
			$pdf->Cell(0,6,utf8_decode("Total: ".$total),1,0,'R');
			$pdf->Ln();
		};
  };
	$i++;
};

$pdf->Output('TodasComprasPorAssociado.pdf','D')
?>
