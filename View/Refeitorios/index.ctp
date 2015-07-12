<div class="refeitorios index">
	<h2><?php echo __('Refeitorios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('associado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('qtd_associado'); ?></th>
			<th><?php echo $this->Paginator->sort('qtd_convidado'); ?></th>
			<th><?php echo $this->Paginator->sort('preco_asc'); ?></th>
			<th><?php echo $this->Paginator->sort('preco_conv'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($refeitorios as $refeitorio): ?>
	<tr>
		<td><?php echo h($refeitorio['Refeitorio']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($refeitorio['Associado']['nome'], array('controller' => 'associados', 'action' => 'view', $refeitorio['Associado']['id'])); ?>
		</td>
		<td><?php echo h($refeitorio['Refeitorio']['data']); ?>&nbsp;</td>
		<td><?php echo h($refeitorio['Refeitorio']['qtd_associado']); ?>&nbsp;</td>
		<td><?php echo h($refeitorio['Refeitorio']['qtd_convidado']); ?>&nbsp;</td>
		<td><?php echo h($refeitorio['Refeitorio']['preco_asc']); ?>&nbsp;</td>
		<td><?php echo h($refeitorio['Refeitorio']['preco_conv']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $refeitorio['Refeitorio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $refeitorio['Refeitorio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $refeitorio['Refeitorio']['id']), array(), __('Are you sure you want to delete # %s?', $refeitorio['Refeitorio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Refeitorio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
