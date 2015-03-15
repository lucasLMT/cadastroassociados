<div class="compras view">
<h2><?php echo __('Compra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Convenio'); ?></dt>
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
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['observacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compra'), array('action' => 'edit', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compra'), array('action' => 'delete', $compra['Compra']['id']), array(), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
