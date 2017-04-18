<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar operadora
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Operadora'); ?>
                <?php echo $this->Form->input('id'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('nome', array('label' => 'Operadora:', 'class' => 'form-control', 'rows' => '1')); ?>
                    <button type="submit" class="btn btn-default">Salvar</button>
                    <?php
                        echo $this->Html->link(
                            'Voltar',
                            array(
                                'controller' => 'Operadoras',
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
