<div class="emprestimos view">
<h2><?php echo __('Emprestimo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Associado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emprestimo['Associado']['nome'], array('controller' => 'associados', 'action' => 'view', $emprestimo['Associado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observavao'); ?></dt>
		<dd>
			<?php echo h($emprestimo['Emprestimo']['observavao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Emprestimo'), array('action' => 'edit', $emprestimo['Emprestimo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Emprestimo'), array('action' => 'delete', $emprestimo['Emprestimo']['id']), array(), __('Are you sure you want to delete # %s?', $emprestimo['Emprestimo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Emprestimos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emprestimo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
