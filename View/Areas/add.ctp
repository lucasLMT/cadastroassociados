<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar área
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Area'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <button type="submit" class="btn btn-default">Adicionar</button>
                <?php
                    echo $this->Html->link(
                        'Voltar',
                        array(
                            'controller' => 'Areas',
                            'action' => 'index',
                            'full_base' => true
                        ),
                        array(
                            'class' => 'btn btn-info',
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
