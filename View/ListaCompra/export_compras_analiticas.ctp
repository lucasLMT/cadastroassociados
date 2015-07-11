<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */

  //declare the xls helper
  $xls= new xlsHelper(new View(null));

  //input the export file name
  $xls->setHeader('compras'.date('Y_m_d'));

  $xls->addXmlHeader();
  $xls->setWorkSheetName('Compras');

  //1st row for columns name
  $xls->openRow();
  $xls->writeString('Matricula');
  $xls->writeString('Associado');
  $xls->writeString('Convenio');
  $xls->writeString('Valor');
  $xls->closeRow();

  //rows for data
  foreach ($compras as $compra):
    $xls->openRow();
    $xls->writeString($compra['Associado']['matricula']);
    $xls->writeString($compra['Associado']['nome']);
    $xls->writeString($compra['Convenio']['nomeDoGrupo']);
    $xls->writeNumber($compra['Compra']['valor']);
    $xls->closeRow();
  endforeach;

  $xls->openRow();
  $xls->writeString('TOTAL =');
  $xls->writeString('');
  $xls->writeNumber($total);
  $xls->closeRow();

  $xls->addXmlFooter();
  exit();
?>
