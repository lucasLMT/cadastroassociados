<div class="panel panel-default">
  <br><br>
    <div class="panel-heading">
        Compras por Convênio
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <?php if ($modo == 1) { ?>
                        <th><?php echo __('Associado'); ?></th>
                        <th><?php echo __('Convênio'); ?></th>
                        <th><?php echo __('Referência'); ?></th>
                        <th><?php echo __('Valor'); ?></th>
                        <th><?php echo __('Descrição'); ?></th>
                    <?php } else { ?>
                        <th><?php echo __('Convênio'); ?></th>
                        <th><?php echo __('Total'); ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php if ($modo == 1) {
                    if (!$todos) {
                        foreach ($compras as $compra): ?>
                            <tr class="odd gradeX">
                                <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                                <td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
                                <?php $total += (float)$compra['Compra']['valor']; ?>
                                <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
			                          $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );?>
									              <td><?php echo h($valor); ?>&nbsp;</td>
                                <td><?php echo h($compra['Compra']['descricao']); ?>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="odd gradeX">
                            <td><?php echo h('Total: ' . $total); ?>&nbsp; </td>
                        </tr>
                    <?php } else {
                        $conv_tmp = $compras[0]['Convenio']['razaoSocial'];
                        $count = Count($compras);
                        $i = 1;
                        foreach ($compras as $compra):
                            if (($conv_tmp <> $compra['Convenio']['razaoSocial']) || ($count == $i)) {
                                if (($conv_tmp == $compra['Convenio']['razaoSocial']) && ($count == $i)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
                                        <?php $total += (float)$compra['Compra']['valor']; ?>
                                        <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
        			                          $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );?>
        									              <td><?php echo h($valor); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Compra']['descricao']); ?>&nbsp;</td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
													                        $total = $this->Number->currency($total,'BRL' );
                                                  echo h('Total: ' . $total); ?>&nbsp; </td>
                                    </tr>
                                    <?php break;
                                }
                                if (($conv_tmp <> $compra['Convenio']['razaoSocial']) && ($count == $i)) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
													                        $total = $this->Number->currency($total,'BRL' );
                                                  echo h('Total: ' . $total); ?>&nbsp; </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
                                        <?php $total = (float)$compra['Compra']['valor']; ?>
                                        <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
        			                          $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );?>
        									              <td><?php echo h($valor); ?>&nbsp;</td>
                                        <td><?php echo h($compra['Compra']['descricao']); ?>&nbsp;</td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
													                        $total = $this->Number->currency($total,'BRL' );
                                                  echo h('Total: ' . $total); ?>&nbsp; </td>
                                    </tr>
                                    <?php break;
                                } ?>
                                <tr class="odd gradeX">
                                    <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                                              $total = $this->Number->currency($total,'BRL' );
                                              echo h('Total: ' . $total); ?>&nbsp; </td>
                                </tr>
                                <?php
                                $conv_tmp = $compra['Convenio']['razaoSocial'];
                                $total = 0;
                            } ?>
                            <tr class="odd gradeX">
                                <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                                <td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
                                <?php $total += (float)$compra['Compra']['valor']; ?>
                                <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
			                          $valor = $this->Number->currency($compra['Compra']['valor'],'BRL' );?>
									              <td><?php echo h($valor); ?>&nbsp;</td>
                                <td><?php echo h($compra['Compra']['descricao']); ?>&nbsp;</td>
                            </tr>
                            <?php $i++;
                        endforeach;
                    }
                } else if ($modo == 2){
                    $valorTotal = 0;
                    $conv_tmp = $compras[0]['Convenio']['razaoSocial'];
                    $count = Count($compras);
                    $i = 1;
                    foreach ($compras as $compra):
                        if (($conv_tmp <> $compra['Convenio']['razaoSocial']) || ($count == $i)) {
                            if ($count == $i && $conv_tmp == $compra['Convenio']['razaoSocial'])
                                $total += $compra['Compra']['valor'];
                                $valorTotal += $total;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo h($conv_tmp); ?>&nbsp;</td>
                                <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                                          $total = $this->Number->currency($total,'BRL' );
                                          echo h($total); ?>&nbsp;</td>
                            </tr>
                            <?php
                            $total = $compra['Compra']['valor'] + 0;
                            if (($conv_tmp <> $compra['Convenio']['razaoSocial']) && ($count == $i)) {
                                $valorTotal += $total;
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                                    <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                                              $total = $this->Number->currency($total,'BRL' );
                                              echo h($total); ?>&nbsp;</td>
                                </tr>
                                <?php
                            }
                            $conv_tmp = $compra['Convenio']['razaoSocial'];
                        } else {
                            $total += $compra['Compra']['valor'];
                        }
                        $i++;
                    endforeach;
                }
                if($modo == 2) { ?>
                      <tr class="odd gradeX">
                        <td><?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                                  $valorTotal = $this->Number->currency($valorTotal,'BRL' );
                                  echo h($valorTotal); ?>&nbsp;</td>
                      </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<?php
if ($modo == 1) {
    if ($compras) {
        echo $this->Html->link(
            'Exportar PDF',
            array(
                'controller' => 'ListaCompra',
                'action' => 'viewpdf_convenios_analiticos',
                'full_base' => true,
                $periodo,
                $convenio,
                $referencia
            ),
            array(
                'class' => 'btn btn-success',
                'role' => 'button'
            )
        );
    }
} else {
    if ($compras) {
        echo $this->Html->link(
            'Exportar PDF',
            array(
                'controller' => 'ListaCompra',
                'action' => 'viewpdf_convenios_sinteticos',
                'full_base' => true,
                $periodo,
                $convenio,
                $referencia
            ),
            array(
                'class' => 'btn btn-success',
                'role' => 'button'
            )
        );
    }
};
?>
<?php
if ($modo == 1) {
    if ($compras) {
        echo $this->Html->link(
            'Exportar CSV',
            array(
                'controller' => 'ListaCompra',
                'action' => 'export_convenios_analiticos',
                $periodo,
                $convenio
            ),
            array(
                'class' => 'btn btn-info',
                'role' => 'button'
            )
        );
    }
} else {
    if ($compras) {
        echo $this->Html->link(
            'Exportar CSV',
            array(
                'controller' => 'ListaCompra',
                'action' => 'export_convenios_sinteticos',
                $periodo,
                $convenio,
                $valorTotal
            ),
            array(
                'class' => 'btn btn-info',
                'role' => 'button'
            )
        );
    }
};
?>
