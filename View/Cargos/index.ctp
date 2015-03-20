<div class="panel panel-default">
	<div class="panel-heading">
	    Cargos
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
	                    <th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('valorAlmoço'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($cargos as $cargo): ?>
					<tr class="odd gradeX">
						<td><?php echo h($cargo['Cargo']['id']); ?>&nbsp;</td>
						<td><?php echo h($cargo['Cargo']['nome']); ?>&nbsp;</td>
						<td><?php echo h($cargo['Cargo']['valorAlmoço']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cargo['Cargo']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cargo['Cargo']['id']), array(), __('Are you sure you want to delete # %s?', $cargo['Cargo']['id'])); ?>
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

