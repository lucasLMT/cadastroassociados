<div class="operadoras index">
	<h2><?php echo __('Operadoras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($operadoras as $operadora): ?>
	<tr>
		<td><?php echo h($operadora['Operadora']['id']); ?>&nbsp;</td>
		<td><?php echo h($operadora['Operadora']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $operadora['Operadora']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $operadora['Operadora']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $operadora['Operadora']['id']), array(), __('Are you sure you want to delete # %s?', $operadora['Operadora']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Operadora'), array('action' => 'add')); ?></li>
	</ul>
</div>
