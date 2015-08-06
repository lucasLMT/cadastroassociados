<div class="operadoras form">
<?php echo $this->Form->create('Operadora'); ?>
	<fieldset>
		<legend><?php echo __('Edit Operadora'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Operadora.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Operadora.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Operadoras'), array('action' => 'index')); ?></li>
	</ul>
</div>
