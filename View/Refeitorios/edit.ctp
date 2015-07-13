<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar almoço
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Refeitorio'); ?>
                	<?php echo $this->Form->input('id'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('associado_id', array('label'=>'Associado:','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('data', array('label'=>'Data:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('qtd_associado', array('label'=>'Quantidade, valor associado:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('qtd_convidado', array('label'=>'Quantidade, valor convidado:','class'=>'form-control', 'rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('preco_asc', array('label'=>'Preço associado:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('preco_conv', array('label'=>'Preço convidado:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
