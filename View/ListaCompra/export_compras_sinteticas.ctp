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
  $xls->writeString('Associado');
  $xls->writeString('Total');
  $xls->closeRow();

  //rows for data
  foreach ($associadosArray as $associado):
    $xls->openRow();
    $xls->writeString($associado['associado']);
    $xls->writeNumber($associado['total']);
    $xls->closeRow();
  endforeach;

  $xls->addXmlFooter();
  exit();
?>
