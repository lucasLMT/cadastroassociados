<div class="linhasTelefonicas form">
<?php echo $this->Form->create('LinhasTelefonica'); ?>
	<fieldset>
		<legend><?php echo __('Edit Linhas Telefonica'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Operadora');
		echo $this->Form->input('Numero');
		echo $this->Form->input('modelo');
		echo $this->Form->input('imei');
		echo $this->Form->input('notafiscal');
		echo $this->Form->input('data');
		echo $this->Form->input('devolucao');
		echo $this->Form->input('associado_id');
		echo $this->Form->input('observacao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LinhasTelefonica.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LinhasTelefonica.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Linhas Telefonicas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
