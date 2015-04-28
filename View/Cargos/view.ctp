<div class="cargos view">
<h2><?php echo __('Cargo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ValorAlmoço'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['valorAlmoço']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cargo'), array('action' => 'edit', $cargo['Cargo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Remover Cargo'), array('action' => 'delete', $cargo['Cargo']['id']), array(), __('Você tem certeza que deseja remover %s?', $cargo['Cargo']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cargos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Cargo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Associados'); ?></h3>
	<?php if (!empty($cargo['Associado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('CEP'); ?></th>
		<th><?php echo __('DataDeAdmissao'); ?></th>
		<th><?php echo __('DataDeNascimento'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('RG'); ?></th>
		<th><?php echo __('Estado Civil'); ?></th>
		<th><?php echo __('Cargo Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Salario'); ?></th>
		<th><?php echo __('Valor Adicional'); ?></th>
		<th><?php echo __('Mensalidade'); ?></th>
		<th><?php echo __('Mensagem'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cargo['Associado'] as $associado): ?>
		<tr>
			<td><?php echo $associado['id']; ?></td>
			<td><?php echo $associado['nome']; ?></td>
			<td><?php echo $associado['endereco']; ?></td>
			<td><?php echo $associado['bairro']; ?></td>
			<td><?php echo $associado['CEP']; ?></td>
			<td><?php echo $associado['dataDeAdmissao']; ?></td>
			<td><?php echo $associado['dataDeNascimento']; ?></td>
			<td><?php echo $associado['telefone']; ?></td>
			<td><?php echo $associado['RG']; ?></td>
			<td><?php echo $associado['estado civil']; ?></td>
			<td><?php echo $associado['cargo_id']; ?></td>
			<td><?php echo $associado['area_id']; ?></td>
			<td><?php echo $associado['salario']; ?></td>
			<td><?php echo $associado['valor adicional']; ?></td>
			<td><?php echo $associado['mensalidade']; ?></td>
			<td><?php echo $associado['mensagem']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Listar'), array('controller' => 'associados', 'action' => 'view', $associado['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'associados', 'action' => 'edit', $associado['id'])); ?>
				<?php echo $this->Form->postLink(__('Remover'), array('controller' => 'associados', 'action' => 'delete', $associado['id']), array(), __('Você tem certeza que deseja remover %s?', $associado['nome'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
