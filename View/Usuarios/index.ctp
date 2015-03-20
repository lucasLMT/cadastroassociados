<div class="panel panel-default">
	<div class="panel-heading">
	    Áreas
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
	                    <th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('login'); ?></th>
						<th><?php echo $this->Paginator->sort('senha'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($usuarios as $usuario): ?>
					<tr class="odd gradeX">
						<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
						<td><?php echo h($usuario['Usuario']['login']); ?>&nbsp;</td>
						<td><?php echo h($usuario['Usuario']['senha']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), array(), __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
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
