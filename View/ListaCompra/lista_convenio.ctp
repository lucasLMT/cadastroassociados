<br><br>
<div class="panel panel-default">
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
						<th><?php echo __('Observação'); ?></th>
                    <?php } else {?>
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
	    						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
	    						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
	    						<?php $total += (float)$compra['Compra']['valor']; ?>
	    						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
	    						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
	    					</tr>
							<?php endforeach; ?>
		                    <tr class="odd gradeX">
								<td><?php echo h('Total: '.$total); ?>&nbsp; </td>
							</tr>
				<?php   } else { 
							$conv_tmp = $compras[0]['Convenio']['nomeDoGrupo'];
				  			$count = Count($compras);
							$i = 1;
				  			foreach ($compras as $compra): 
				  				if (($conv_tmp <> $compra['Convenio']['nomeDoGrupo']) || ($count == $i)) {
				  					if (($conv_tmp == $compra['Convenio']['nomeDoGrupo']) && ($count == $i)) { ?>
										<tr class="odd gradeX">
				    						<td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
				    						<?php $total += (float)$compra['Compra']['valor']; ?>
				    						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
				    					</tr>				    					
				    					<tr class="odd gradeX">
											<td><?php echo h('Total: '.$total); ?>&nbsp; </td>
										</tr>
				  			<?php		break;
				  					} 
				  					if (($conv_tmp <> $compra['Convenio']['nomeDoGrupo']) && ($count == $i)) { ?>
				  						<tr class="odd gradeX">
				    						<td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
				    						<?php $total += (float)$compra['Compra']['valor']; ?>
				    						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
				    						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
				    					</tr>
				    					<tr class="odd gradeX">
											<td><?php echo h('Total: '.$total); ?>&nbsp; </td>
										</tr>
				  			<?php		break;
				  					} ?>
					  				<tr class="odd gradeX">
										<td><?php echo h('Total: '.$total); ?>&nbsp; </td>
									</tr>
					  			<?php 
					  				$conv_tmp = $compra['Convenio']['nomeDoGrupo'];
					  				$total = 0;
					  			} ?>
		    					<tr class="odd gradeX">
		    						<td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
		    						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
		    						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
		    						<?php $total += (float)$compra['Compra']['valor']; ?>
		    						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
		    						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
		    					</tr>
						<?php   $i++;
							endforeach;
						}
              		} else {
                            $conv_tmp = $compras[0]['Convenio']['nomeDoGrupo'];
							$count = Count($compras);
							$i = 1;
                            foreach ($compras as $compra):
                                if (($conv_tmp <> $compra['Convenio']['nomeDoGrupo']) || ($count == $i)) {
									if ($count == $i && $conv_tmp == $compra['Convenio']['nomeDoGrupo'])
										$total += $compra['Compra']['valor'];
                    ?>
								<tr class="odd gradeX">
                                    <td><?php echo h($conv_tmp); ?>&nbsp;</td>
                                    <td><?php echo h($total); ?>&nbsp;</td>
								</tr>
								<?php
                            		$total = $compra['Compra']['valor'] + 0;
									if (($conv_tmp <> $compra['Convenio']['nomeDoGrupo']) && ($count == $i)) {
								?>
										<tr class="odd gradeX">
											<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
											<td><?php echo h($total); ?>&nbsp;</td>
										</tr>
								<?php
									}
									$conv_tmp = $compra['Convenio']['nomeDoGrupo'];
                            	} else {
                                	$total += $compra['Compra']['valor'];
                            	}
								$i++;
							endforeach;
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
						$convenio
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
      		$convenio
    ),
		array(
			'class' => 'btn btn-info',
			'role' => 'button'
    )
  );
?>
