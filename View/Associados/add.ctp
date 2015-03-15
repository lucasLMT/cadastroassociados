<div class="associados form">
<?php echo $this->Form->create('Associado'); ?>
	<fieldset>
		<legend><?php echo __('Add Associado'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('endereco');
		echo $this->Form->input('bairro');
		echo $this->Form->input('CEP');
		echo $this->Form->input('dataDeAdmissao');
		echo $this->Form->input('dataDeNascimento');
		echo $this->Form->input('telefone');
		echo $this->Form->input('RG');
		echo $this->Form->input('estado civil');
		echo $this->Form->input('cargo_id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('salario');
		echo $this->Form->input('valor adicional');
		echo $this->Form->input('mensalidade');
		echo $this->Form->input('mensagem');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Associados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
