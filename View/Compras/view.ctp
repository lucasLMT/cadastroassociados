<div class="compras view">
<h2><?php echo __('Compra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Convênio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Convenio']['id'], array('controller' => 'convenios', 'action' => 'view', $compra['Convenio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Associado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Associado']['id'], array('controller' => 'associados', 'action' => 'view', $compra['Associado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NomeAssociado'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['nomeAssociado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referência'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observação'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['observacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Compra'), array('action' => 'edit', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Remover Compra'), array('action' => 'delete', $compra['Compra']['id']), array(), __('Você tem certeza que deseja remover %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Compras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Compra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
