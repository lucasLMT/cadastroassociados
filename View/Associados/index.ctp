<div class="associados index">
	<h2><?php echo __('Associados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco'); ?></th>
			<th><?php echo $this->Paginator->sort('bairro'); ?></th>
			<th><?php echo $this->Paginator->sort('CEP'); ?></th>
			<th><?php echo $this->Paginator->sort('dataDeAdmissao'); ?></th>
			<th><?php echo $this->Paginator->sort('dataDeNascimento'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('RG'); ?></th>
			<th><?php echo $this->Paginator->sort('estado civil'); ?></th>
			<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th><?php echo $this->Paginator->sort('salario'); ?></th>
			<th><?php echo $this->Paginator->sort('valor adicional'); ?></th>
			<th><?php echo $this->Paginator->sort('mensalidade'); ?></th>
			<th><?php echo $this->Paginator->sort('mensagem'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($associados as $associado): ?>
	<tr>
		<td><?php echo h($associado['Associado']['id']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['bairro']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['CEP']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['dataDeAdmissao']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['dataDeNascimento']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['RG']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['estado civil']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($associado['Cargo']['id'], array('controller' => 'cargos', 'action' => 'view', $associado['Cargo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($associado['Area']['id'], array('controller' => 'areas', 'action' => 'view', $associado['Area']['id'])); ?>
		</td>
		<td><?php echo h($associado['Associado']['salario']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['valor adicional']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['mensalidade']); ?>&nbsp;</td>
		<td><?php echo h($associado['Associado']['mensagem']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $associado['Associado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $associado['Associado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $associado['Associado']['id']), array(), __('Are you sure you want to delete # %s?', $associado['Associado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Associado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
