<div class="refeitorios form">
<?php echo $this->Form->create('Refeitorio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Refeitorio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('associado_id');
		echo $this->Form->input('data');
		echo $this->Form->input('qtd_associado');
		echo $this->Form->input('qtd_convidado');
		echo $this->Form->input('preco_asc');
		echo $this->Form->input('preco_conv');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Refeitorio.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Refeitorio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Refeitorios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
