<div class="convenios index">
	<h2><?php echo __('Convenios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('razaoSocial'); ?></th>
			<th><?php echo $this->Paginator->sort('rua'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade'); ?></th>
			<th><?php echo $this->Paginator->sort('CEP'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('percDesc'); ?></th>
			<th><?php echo $this->Paginator->sort('contato'); ?></th>
			<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nomeDoGrupo'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($convenios as $convenio): ?>
	<tr>
		<td><?php echo h($convenio['Convenio']['id']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['razaoSocial']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['rua']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['CEP']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['fax']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['percDesc']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['contato']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($convenio['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $convenio['Grupo']['id'])); ?>
		</td>
		<td><?php echo h($convenio['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
		<td><?php echo h($convenio['Convenio']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $convenio['Convenio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $convenio['Convenio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $convenio['Convenio']['id']), array(), __('Are you sure you want to delete # %s?', $convenio['Convenio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Convenio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
