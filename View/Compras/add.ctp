<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar compra
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Compra'); ?>
					<div class="form-group">
					<?php echo $this->Form->input('nomeAssociado', array('label'=>'Nome:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('valor', array('label'=>'Valor:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('referencia', array('label'=>'Referência:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('observacao', array('label'=>'Observação:','class'=>'form-control','rows'=>'4'));?>
					</div>
					<button type="submit" class="btn btn-default">Enviar</button>
				<?php echo $this->Form->end(); ?>
			</div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>

