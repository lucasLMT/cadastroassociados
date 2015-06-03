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
                    <?php if ($modo == 1) { ?>
						<th><?php echo __('Associado'); ?></th>
						<th><?php echo __('Convênio'); ?></th>
						<th><?php echo __('Referência'); ?></th>
						<th><?php echo __('Observação'); ?></th>
						<th><?php echo __('Valor'); ?></th>
                    <?php } else {?>
                        <th><?php echo __('Associado'); ?></th>
                        <th><?php echo __('Total'); ?></th>
                    <?php } ?>
	                </tr>
	            </thead>
	            <tbody>
					<?php if ($modo == 1) {
                        foreach ($compras as $compra): ?>
    					<tr class="odd gradeX">
    						<td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
    						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
    						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
    						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
    						<?php $total += (float)$compra['Compra']['valor']; ?>
    						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
    					</tr>
					<?php endforeach; ?>
                    <tr class="odd gradeX">
						<td><?php echo h('Total: '.$total); ?>&nbsp; </td>
					</tr>
                    <?php} else {
                            $assoc_tmp = $compra['Associado']['nome'];
                            foreach ($compras as $compra):
                                if ($assoc_tmp <> $compra['Associado']['nome']) {
                                    $assoc_tmp = $compra['Associado']['nome'];
                    ?>
                                    <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                                    <td><?php echo h($total); ?>&nbsp;</td>
                        <?php
                            $total = $compra['Compra']['valor'];
                            } else {
                                $total += $compra['Compra']['valor'];
                            } ?>
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
						$data_inicio,
						$data_fim,
						$associado
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
			'controller'=>'ListaCompra',
			'action'=>'export',
			$data_inicio,
			$data_fim,
      $associado
    ),
		array(
			'class' => 'btn btn-info',
			'role' => 'button'
    )
  );
?>
