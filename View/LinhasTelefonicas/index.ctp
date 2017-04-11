<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Buscar Linhas por associado ou número da linha
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('LinhasTelefonica'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('associado_id', array('label' => 'Associado*', 'class' => 'form-control', 'empty' => '', 'required' => true)); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('numero', array('label' => 'Número da linha:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('modo_id', array('label' => 'Modo*', 'class' => 'form-control', 'empty' => '', 'required' => true )); ?>
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
                <?php
                    echo $this->Html->link(
                        'Cadastrar uma nova linha',
                        array(
                            'controller' => 'LinhasTelefonicas',
                            'action' => 'add',
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

