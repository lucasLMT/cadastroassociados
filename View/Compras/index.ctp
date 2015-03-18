<div class="panel panel-default">
	<div class="panel-heading">
	    Compras
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
	                    <th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('convenio_id'); ?></th>
						<th><?php echo $this->Paginator->sort('associado_id'); ?></th>
						<th><?php echo $this->Paginator->sort('nomeAssociado'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th><?php echo $this->Paginator->sort('referencia'); ?></th>
						<th><?php echo $this->Paginator->sort('observacao'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($compras as $compra): ?>
					<tr class="odd gradeX">
						<td><?php echo h($compra['Compra']['id']); ?>&nbsp;</td>
						<td><?php echo h($compra['Convenio']['id']); ?>&nbsp;</td>
						<td><?php echo h($compra['Associado']['id']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['nomeAssociado']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $compra['Compra']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compra['Compra']['id']), array(), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
	        </table>
	    </div>
	</div>
	<!-- /.panel-body -->
</div>
<p>
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
?>	
</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
