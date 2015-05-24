<div class="saudePlanos form">
<?php echo $this->Form->create('SaudePlano'); ?>
	<fieldset>
		<legend><?php echo __('Edit Saude Plano'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo');
		echo $this->Form->input('valorAssociado');
		echo $this->Form->input('valorSebrae');
		echo $this->Form->input('valorAFSebrae');
		echo $this->Form->input('observacao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SaudePlano.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SaudePlano.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Saude Planos'), array('action' => 'index')); ?></li>
	</ul>
</div>
