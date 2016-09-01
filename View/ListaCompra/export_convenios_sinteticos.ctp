<?php
/**
 * Export all member records in .xls format
 * with the help of the xlsHelper
 */

//declare the xls helper
$xls = new xlsHelper(new View(null));

//input the export file name
$xls->setHeader('ConveniosSinteticos' . date('d-m-Y'));

$xls->addXmlHeader();
$xls->setWorkSheetName('Compras Sintéticas por Convênios.');
$xls->openRow();
$xls->writeString('Compras Sintéticas por Convênios.');
$xls->closeRow();

//1st row for columns name
$xls->openRow();
$xls->writeString('Convênio');
$xls->writeString('Total');
$xls->closeRow();

//rows for data
$convenio_tmp = $compras[0]['Convenio']['razaoSocial'];
$count = Count($compras);
$total = 0;
$i = 1;
foreach ($compras as $compra):
    if (($convenio_tmp <> $compra['Convenio']['razaoSocial']) || ($count == $i)) {
        if ($count == $i && $convenio_tmp == $compra['Convenio']['razaoSocial'])
            $total += $compra['Compra']['valor'];

        $xls->openRow();
        $xls->writeString($convenio_tmp);
        $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
        $total = $this->Number->currency($total,'BRL' );
        $xls->writeString($total);
        $xls->closeRow();

        $total = $compra['Compra']['valor'] + 0;
        if (($convenio_tmp <> $compra['Convenio']['razaoSocial']) && ($count == $i)) {

            $xls->openRow();
            $xls->writeString($compra['Convenio']['razaoSocial']);
            $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
            $total = $this->Number->currency($total,'BRL' );
            $xls->writeString($total);
            $xls->closeRow();
        }
        $convenio_tmp = $compra['Convenio']['razaoSocial'];
    } else {
        $total += $compra['Compra']['valor'];
    }
    $i++;
endforeach;

$xls->addXmlFooter();
exit();
?>
