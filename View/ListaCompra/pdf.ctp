<?php
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',20);
    //debug($compras);
    //$fpdf->Cell(100,4,'Compras',1,0,'C');
    //$fpdf->Cell(40);
    //$fpdf->Ln(10);
    //$fpdf->SetFont('Arial','',10);

/*----------------------- Cabeçalho do Formulário ------------------------ */

    $fpdf->SetXY(15,15);// Posicionando as células
    $fpdf->Cell(180,45,"Relatorio Compras por associado",1,1,'C');// Célula do cabeçalho
    $fpdf->SetFont('Arial','B',15);

/* Colunas do Formulário */
    $fpdf->SetFont('Arial','B',9);// Configurando a fonte
    //$fpdf->SetXY(15,110);// Posicionando as células
    $fpdf->Cell(60,15,"Associado",1,1,'C');// Configurando as células
    //$fpdf->SetXY(75,110);
    $fpdf->Cell(60,15,"Convenio",1,0,'C');
    //$fpdf->SetXY (135,110);
    $fpdf->Cell (60,15,"Valor",1,0,'C');
    //$fpdf->SetXY(135,110);
    //$fpdf->Cell(140,15,"Valor",1,1,'C');
    //$fpdf->SetXY (275,110);
    //$fpdf->Cell (180,15,"Descrição",1,1,'C');
    //$fpdf->SetXY (455,110);
    //$fpdf->Cell (63,15,"Documento",1,1,'C');
    //$fpdf->SetXY (518,110);
    //$fpdf->Cell (60,15,"Valor",1,1,'C');

/* ------------------------ Conteúdo ----------------------------------*/
    $fpdf->SetFont('Times','i',10);
    foreach($compras as $compra){
      $fpdf->Cell(60,4,$compra['Associado']['nome'],1,0,'C');
      $fpdf->Cell(60,4,$compra['Convenio']['nomeDoGrupo'],1,0,'C');
      $fpdf->Cell(60,4,$compra['Compra']['valor'],1,0,'C');
      $fpdf->Ln(4);
    }


    //$fpdf->SetXY(15,135);
    //$fpdf->Cell(60,15,$data_conta,1,1,'C');
    //$fpdf->SetXY(75,135);
    //$fpdf->Cell(60,15,$data_baixa,1,1,'C');
    //$fpdf->SetXY(135,135);
    //$fpdf->Cell(140,15,$fornecedor,1,1,'C');
    //$fpdf->SetXY(275,135);
    //$fpdf->Cell(180,15,$descricao,1,1,'C');
    //$fpdf->SetXY(455,135);
    //$fpdf->Cell(63,15,$documento,1,1,'C');
    //$fpdf->SetXY(518,135);
    //$fpdf->Cell(63,15,$valor_real,1,1,'C');

/*------------------------------ Rodapé ---------------------------------*/
    $fpdf->Output('test.pdf','D');

?>
