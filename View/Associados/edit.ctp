<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar associado
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Associado'); ?>
                	<?php echo $this->Form->input('id'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('nome', array('label'=>'Nome:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('endereco', array('label'=>'Endereço:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('bairro', array('label'=>'Bairro:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('dataDeAdmissao', array('label'=>'Data de admissão:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('dataDeNascimento', array('label'=>'Data de nascimento:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('telefone', array('label'=>'Telefone:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('RG', array('label'=>'RG:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('estado civil', array('label'=>'Estado civil:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('salario', array('label'=>'Salário:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('valor adicional', array('label'=>'Valor adicional:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('mensalidade', array('label'=>'Mensalidade:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('mensagem', array('label'=>'Mensagem:','class'=>'form-control','rows'=>'4')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>


<div class="associados form">
<?php echo $this->Form->create('Associado'); ?>
	<fieldset>
		<legend><?php echo __('Edit Associado'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Associado.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Associado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Associados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('controller' => 'compras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('controller' => 'compras', 'action' => 'add')); ?> </li>
	</ul>
</div>
