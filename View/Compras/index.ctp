<div class="compras index">
	<h2><?php echo __('Compras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
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
	<tr>
		<td><?php echo h($compra['Compra']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($compra['Convenio']['id'], array('controller' => 'convenios', 'action' => 'view', $compra['Convenio']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($compra['Associado']['id'], array('controller' => 'associados', 'action' => 'view', $compra['Associado']['id'])); ?>
		</td>
		<td><?php echo h($compra['Compra']['nomeAssociado']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $compra['Compra']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $compra['Compra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compra['Compra']['id']), array(), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
