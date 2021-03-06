<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar cargo
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Cargo'); ?>
                <?php echo $this->Form->input('id'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('mealvalue', array('label' => 'Valor do almoço: (Exemplo 1234.56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
                <?php
                    echo $this->Html->link(
                        'Voltar',
                        array(
                            'controller' => 'Cargos',
                            'action' => 'index',
                            'full_base' => true
                        ),
                        array(
                            'class' => 'btn btn-default',
                            'role' => 'button'
                        )
                    );
                ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
