<?php
/**
 * Export all member records in .xls format
 * with the help of the xlsHelper
 */

//declare the xls helper
$xls = new xlsHelper(new View(null));

//input the export file name
$xls->setHeader('ConveniosAnaliticos' . date('Y_m_d'));

$xls->addXmlHeader();
$xls->setWorkSheetName('Compras Analíticas por Convênios.');
$xls->openRow();
$xls->writeString('Compras Analíticas por Convênios.');
$xls->closeRow();

//1st row for columns name
$xls->openRow();
$xls->writeString("Convênio: " . $compras[0]['Convenio']['razaoSocial']);
$xls->closeRow();
$xls->openRow();
$xls->writeString('Associado');
$xls->writeString('Valor');
$xls->closeRow();

//rows for data
foreach ($compras as $compra):
    $xls->openRow();
    $xls->writeString($compra['Associado']['nome']);
    $xls->writeString($compra['Compra']['valor']);
    $xls->closeRow();
endforeach;

$xls->openRow();
$xls->writeString('Total: ');
$xls->writeNumber($total);
$xls->closeRow();

$xls->addXmlFooter();
exit();
?>
