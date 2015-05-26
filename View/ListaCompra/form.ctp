<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Relatório: Compras por usuário
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('ListaCompra'); ?>           
                	<div class="form-group">
                    	<?php echo $this->Form->input('associado_id', array('label'=>'Nome:','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('data_inicio', array('label'=>'Data inicial:','type'=>'date','class'=>'form-control','dateFormat'=>'DMY')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('data_fim', array('label'=>'Data final:','type'=>'date','class'=>'form-control','dateFormat'=>'DMY')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>