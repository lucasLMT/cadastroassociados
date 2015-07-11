<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */

  //declare the xls helper
  $xls= new xlsHelper(new View(null));

  //input the export file name
  $xls->setHeader('convenios'.date('Y_m_d'));

  $xls->addXmlHeader();
  $xls->setWorkSheetName('Convenios');

  //1st row for columns name
  $xls->openRow();
  $xls->writeString('Convênio');
  $xls->writeString('Total');
  $xls->closeRow();

  //rows for data
  foreach ($conveniosArray as $convenio):
    $xls->openRow();
    $xls->writeString($convenio['convenio']);
    $xls->writeNumber($convenio['total']);
    $xls->closeRow();
  endforeach;

  $xls->addXmlFooter();
  exit();
?>
