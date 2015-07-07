<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Relatório: Compras por convênio
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('ListaCompra'); ?>
                	<div class="form-group">
                    	<?php echo $this->Form->input('convenio_id', array('label'=>'Nome:','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('periodo_id', array('label'=>'Período:','class'=>'form-control')); ?>
                    </div>
                    <table width="100%" cellpadding="5px">
                        <tr>
                            <td>
                                <div class="form-group">
                                <?php echo $this->Form->input('modo_id', array('label'=>'Modo:','class'=>'form-control')); ?>
                                </div>            
                            </td>
                            <td>
                                <div class="form-group">
                                <?php echo $this->Form->input('todos', array('label'=>'Trazer todos:','class'=>'form-control')); ?>
                                </div>            
                            </td>
                        </tr>
                    </table> 
                    <button type="submit" class="btn btn-default">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
