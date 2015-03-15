<div class="convenios form">
<?php echo $this->Form->create('Convenio'); ?>
	<fieldset>
		<legend><?php echo __('Add Convenio'); ?></legend>
	<?php
		echo $this->Form->input('razaoSocial');
		echo $this->Form->input('rua');
		echo $this->Form->input('bairro');
		echo $this->Form->input('cidade');
		echo $this->Form->input('CEP');
		echo $this->Form->input('telefone');
		echo $this->Form->input('fax');
		echo $this->Form->input('percDesc');
		echo $this->Form->input('contato');
		echo $this->Form->input('grupo_id');
		echo $this->Form->input('nomeDoGrupo');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Convenios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
