<div class="saudePlanos index">
	<h2><?php echo __('Saude Planos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('valorAssociado'); ?></th>
			<th><?php echo $this->Paginator->sort('valorSebrae'); ?></th>
			<th><?php echo $this->Paginator->sort('valorAFSebrae'); ?></th>
			<th><?php echo $this->Paginator->sort('observacao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($saudePlanos as $saudePlano): ?>
	<tr>
		<td><?php echo h($saudePlano['SaudePlano']['id']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['nome']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['valorAssociado']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['valorSebrae']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['valorAFSebrae']); ?>&nbsp;</td>
		<td><?php echo h($saudePlano['SaudePlano']['observacao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $saudePlano['SaudePlano']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $saudePlano['SaudePlano']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $saudePlano['SaudePlano']['id']), array(), __('Are you sure you want to delete # %s?', $saudePlano['SaudePlano']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Saude Plano'), array('action' => 'add')); ?></li>
	</ul>
</div>
