<div class="grupos view">
<h2><?php echo __('Grupo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($grupo['Grupo']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Grupo'), array('action' => 'edit', $grupo['Grupo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Remover Grupo'), array('action' => 'delete', $grupo['Grupo']['id']), array(), __('Você tem certeza que deseja remover %s?', $grupo['Grupo']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Grupo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Convenios'); ?></h3>
	<?php if (!empty($grupo['Convenio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('RazaoSocial'); ?></th>
		<th><?php echo __('Rua'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('CEP'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('PercDesc'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('NomeDoGrupo'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($grupo['Convenio'] as $convenio): ?>
		<tr>
			<td><?php echo $convenio['id']; ?></td>
			<td><?php echo $convenio['razaoSocial']; ?></td>
			<td><?php echo $convenio['rua']; ?></td>
			<td><?php echo $convenio['bairro']; ?></td>
			<td><?php echo $convenio['cidade']; ?></td>
			<td><?php echo $convenio['CEP']; ?></td>
			<td><?php echo $convenio['telefone']; ?></td>
			<td><?php echo $convenio['fax']; ?></td>
			<td><?php echo $convenio['percDesc']; ?></td>
			<td><?php echo $convenio['contato']; ?></td>
			<td><?php echo $convenio['grupo_id']; ?></td>
			<td><?php echo $convenio['nomeDoGrupo']; ?></td>
			<td><?php echo $convenio['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Listar'), array('controller' => 'convenios', 'action' => 'view', $convenio['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'convenios', 'action' => 'edit', $convenio['id'])); ?>
				<?php echo $this->Form->postLink(__('Remover'), array('controller' => 'convenios', 'action' => 'delete', $convenio['id']), array(), __('Você tem certeza que deseja remover %s?', $convenio['nomeDoGrupo'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
