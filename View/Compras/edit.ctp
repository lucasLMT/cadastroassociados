<div class="compras form">
<?php echo $this->Form->create('Compra'); ?>
	<fieldset>
		<legend><?php echo __('Edit Compra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('convenio_id');
		echo $this->Form->input('associado_id');
		echo $this->Form->input('nomeAssociado');
		echo $this->Form->input('valor');
		echo $this->Form->input('referencia');
		echo $this->Form->input('observacao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Compra.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Compra.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Convenios'), array('controller' => 'convenios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Convenio'), array('controller' => 'convenios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
