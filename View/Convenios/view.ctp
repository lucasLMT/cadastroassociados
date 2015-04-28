<div class="convenios view">
<h2><?php echo __('Convenio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RazaoSocial'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['razaoSocial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rua'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['rua']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CEP'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['CEP']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PercDesc'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['percDesc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contato'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['contato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($convenio['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $convenio['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NomeDoGrupo'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['nomeDoGrupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($convenio['Convenio']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Convenio'), array('action' => 'edit', $convenio['Convenio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Remover Convenio'), array('action' => 'delete', $convenio['Convenio']['id']), array(), __('Você tem certeza que deseja remover %s?', $convenio['Convenio']['nomeDoGrupo'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Convenios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Convenio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Compras'); ?></h3>
	<?php if (!empty($convenio['Compra'])): ?>
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
	<?php foreach ($convenio['Compra'] as $compra): ?>
		<tr>
			<td><?php echo $compra['id']; ?></td>
			<td><?php echo $compra['convenio_id']; ?></td>
			<td><?php echo $compra['associado_id']; ?></td>
			<td><?php echo $compra['nomeAssociado']; ?></td>
			<td><?php echo $compra['valor']; ?></td>
			<td><?php echo $compra['referencia']; ?></td>
			<td><?php echo $compra['observacao']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Listar'), array('controller' => 'compras', 'action' => 'view', $compra['id'])); ?>
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
