<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar período
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Periodo'); ?>
                		<div class="form-group">
                    	<?php echo $this->Form->input('referencia', array('label'=>'Referência:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
										<div class="form-group">
                    	<?php echo $this->Form->input('data_inicial', array('label'=>'Data inicial:','class'=>'form-control','dateFormat'=>'DMY')); ?>
                    </div>
										<div class="form-group">
                    	<?php echo $this->Form->input('data_final', array('label'=>'Data final:','class'=>'form-control','dateFormat'=>'DMY')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
