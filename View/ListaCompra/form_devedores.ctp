<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Relatório: Devedores
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('ListaCompra'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('periodo_id', array('label'=>'Período:','class'=>'form-control')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>