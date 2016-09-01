<?php
/**
 * Export all member records in .xls format
 * with the help of the xlsHelper
 */

//declare the xls helper
$xls = new xlsHelper(new View(null));

//input the export file name
$xls->setHeader('ComprasSinteticas' . date('d-m-Y'));

$xls->addXmlHeader();
$xls->setWorkSheetName('Compras Sintéticas por Associado.');
$xls->openRow();
$xls->writeString('Compras Sintéticas por Associado.');
$xls->closeRow();

//1st row for columns name
$xls->openRow();
$xls->writeString('Associado');
$xls->writeString('Total');
$xls->closeRow();

//rows for data
$assoc_tmp = $compras[0]['Associado']['nome'];
$count = Count($compras);
$total = 0;
$i = 1;
foreach ($compras as $compra):
    if (($assoc_tmp <> $compra['Associado']['nome']) || ($count == $i)) {
        if ($count == $i && $assoc_tmp == $compra['Associado']['nome'])
            $total += $compra['Compra']['valor'];

        $xls->openRow();
        $xls->writeString($assoc_tmp);
        $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
        $total = $this->Number->currency($total,'BRL' );
        $xls->writeString($total);
        $xls->closeRow();

        $total = $compra['Compra']['valor'] + 0;
        if (($assoc_tmp <> $compra['Associado']['nome']) && ($count == $i)) {

            $xls->openRow();
            $xls->writeString($compra['Associado']['nome']);
            $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
            $total = $this->Number->currency($total,'BRL' );
            $xls->writeString($total);
            $xls->closeRow();
        }
        $assoc_tmp = $compra['Associado']['nome'];
    } else {
        $total += $compra['Compra']['valor'];
    }
    $i++;
endforeach;

$xls->addXmlFooter();
exit();
?>
