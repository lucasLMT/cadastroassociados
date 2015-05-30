<div class="periodos view">
<h2><?php echo __('Periodo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicial'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['data_inicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Final'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['data_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($periodo['Periodo']['referencia']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Periodo'), array('action' => 'edit', $periodo['Periodo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Periodo'), array('action' => 'delete', $periodo['Periodo']['id']), array(), __('Are you sure you want to delete # %s?', $periodo['Periodo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Periodos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Periodo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
