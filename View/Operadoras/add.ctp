<div class="operadoras form">
<?php echo $this->Form->create('Operadora'); ?>
	<fieldset>
		<legend><?php echo __('Add Operadora'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Operadoras'), array('action' => 'index')); ?></li>
	</ul>
</div>
