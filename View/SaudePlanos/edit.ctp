<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar plano de saúde
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('SaudePlano'); ?>
                <?php
                echo $this->Form->input('id');
                ?>
                <div class="form-group">
                    <?php echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('tipo', array('label' => 'Tipo:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('valorAssociado', array('type' => 'decimal','label' => 'Valor para o assocaido: (Exemplo 1.234,56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('valorSebrae', array('type' => 'decimal','label' => 'Valor para o Sebrae: (Exemplo 1.234,56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('valorAFSebrae', array('type' => 'decimal','label' => 'Valor para a Associação dos Funcionários: (Exemplo 1.234,56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('observacao', array('label' => 'Observação:', 'class' => 'form-control', 'rows' => '4')); ?>
                </div>
                <button type="submit" class="btn btn-default">Salvar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
