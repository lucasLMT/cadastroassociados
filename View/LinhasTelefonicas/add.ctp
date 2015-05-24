<div class="linhasTelefonicas form">
<?php echo $this->Form->create('LinhasTelefonica'); ?>
	<fieldset>
		<legend><?php echo __('Add Linhas Telefonica'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Linhas Telefonicas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
