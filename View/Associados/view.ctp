<div class="associados view">
<h2><?php echo __('Associado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CEP'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['CEP']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DataDeAdmissao'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['dataDeAdmissao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DataDeNascimento'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['dataDeNascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RG'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['RG']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Civil'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['estado civil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($associado['Cargo']['id'], array('controller' => 'cargos', 'action' => 'view', $associado['Cargo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($associado['Area']['id'], array('controller' => 'areas', 'action' => 'view', $associado['Area']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['salario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Adicional'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['valor adicional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensalidade'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['mensalidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensagem'); ?></dt>
		<dd>
			<?php echo h($associado['Associado']['mensagem']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Associado'), array('action' => 'edit', $associado['Associado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Remover Associado'), array('action' => 'delete', $associado['Associado']['id']), array(), __('Você tem certeza que deseja remover %s?', $associado['Associado']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Associados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Associado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Compras'); ?></h3>
	<?php if (!empty($associado['Compra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Convenio Id'); ?></th>
		<th><?php echo __('Associado Id'); ?></th>
		<th><?php echo __('NomeAssociado'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Referencia'); ?></th>
		<th><?php echo __('Observacao'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($associado['Compra'] as $compra): ?>
		<tr>
			<td><?php echo $compra['id']; ?></td>
			<td><?php echo $compra['convenio_id']; ?></td>
			<td><?php echo $compra['associado_id']; ?></td>
			<td><?php echo $compra['nomeAssociado']; ?></td>
			<td><?php echo $compra['valor']; ?></td>
			<td><?php echo $compra['referencia']; ?></td>
			<td><?php echo $compra['observacao']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'compras', 'action' => 'view', $compra['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'compras', 'action' => 'edit', $compra['id'])); ?>
				<?php echo $this->Form->postLink(__('Remover'), array('controller' => 'compras', 'action' => 'delete', $compra['id']), array(), __('Você tem certeza que deseja remover %s?', $compra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
