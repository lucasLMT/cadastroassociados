<br><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Compras por Associado
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo __('Associado'); ?></th>
                    <th><?php echo __('Total'); ?></th>
                    <th><?php echo __('Valor Excedido'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $assoc_tmp = $compras[0]['Associado']['nome'];
                $count = Count($compras);
                $i = 1;
                $limite = 0;
                foreach ($compras as $compra):
                    if (($assoc_tmp <> $compra['Associado']['nome']) || ($count == $i)) {
                        if ($count == $i && $assoc_tmp == $compra['Associado']['nome']) {
                            $total += $compra['Compra']['valor'];
                            $limite = $compra['Associado']['salario'] * 0.3;
                        }
                        if ($total > $limite) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo h($assoc_tmp); ?>&nbsp;</td>
                                <td><?php echo h($total); ?>&nbsp;</td>
                                <td><?php echo h($total - $limite); ?>&nbsp;</td>
                            </tr>
                        <?php }
                        $total = $compra['Compra']['valor'] + 0;
                        if (($assoc_tmp <> $compra['Associado']['nome']) && ($count == $i)) {
                            if ($total > $limite) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                    <td><?php echo h($total); ?>&nbsp;</td>
                                    <td><?php echo h($total - $limite); ?>&nbsp;</td>
                                </tr>
                            <?php }
                        }
                        $assoc_tmp = $compra['Associado']['nome'];
                    } else {
                        $total += $compra['Compra']['valor'];
                        $limite = $compra['Associado']['salario'] * 0.3;
                    }
                    $i++;
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<?php
echo $this->Html->link(
    'Exportar PDF',
    array(
        'controller' => 'ListaCompra',
        'action' => 'viewpdf',
        'full_base' => true,
        $periodo
    ),
    array(
        'class' => 'btn btn-success',
        'role' => 'button'
    )
);
?>
<?php
echo $this->Html->link(
    'Exportar CSV',
    array(
        'controller' => 'ListaCompra',
        'action' => 'export',
        $periodo
    ),
    array(
        'class' => 'btn btn-info',
        'role' => 'button'
    )
);
?>
