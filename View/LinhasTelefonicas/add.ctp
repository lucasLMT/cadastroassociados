<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar linha telefônica
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('LinhasTelefonica'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('associado_id', array('label'=>'Associado:','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('Operadora', array('label'=>'Operadora:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('Número', array('label'=>'Número:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('modelo', array('label'=>'Modelo:','class'=>'form-control', 'rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('imei', array('label'=>'Imei:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('notafiscal', array('label'=>'Nota fiscal:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('data', array('label'=>'Data:','dateFormat'=>'DMY','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('devolucao', array('label'=>'Data de devolução:','dateFormat'=>'DMY','class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('observacao', array('label'=>'Telefone:','class'=>'form-control','rows'=>'1')); ?>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                    <button type="reset" class="btn btn-default">Limpar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
