<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar convênio
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Convenio'); ?>
					<?php echo $this->Form->input('id');?>
					<div class="form-group">
						<?php echo $this->Form->input('razaoSocial', array('label'=>'Razão social:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('rua', array('label'=>'Rua:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('bairro', array('label'=>'Bairro:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('cidade', array('label'=>'Cidade:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('CEP', array('label'=>'CEP:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('telefone', array('label'=>'Telefone:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('fax', array('label'=>'Fax:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('percDesc', array('label'=>'percDesc:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('contato', array('label'=>'Contato:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('nomeDoGrupo', array('label'=>'Nome do grupo:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('status', array('label'=>'Status:','class'=>'form-control','rows'=>'1'));?>
					</div>
					<button type="submit" class="btn btn-default">Enviar</button>
				<?php echo $this->Form->end(); ?>
			</div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>

