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
						<th><?php echo __('convenio_id'); ?></th>
						<th><?php echo __('associado_id'); ?></th>
						<th><?php echo __('valor'); ?></th>
						<th><?php echo __('referencia'); ?></th>
						<th><?php echo __('observacao'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($compras as $compra): ?>
					<tr class="odd gradeX">
						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
						<td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
	        </table>
	    </div>
	</div>
	<!-- /.panel-body -->
</div>