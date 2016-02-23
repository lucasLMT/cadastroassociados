<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Editar usuários
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Usuario'); ?>
                echo $this->Form->input('id');
                <div class="form-group">
                    <?php echo $this->Form->input('login', array('label' => 'Login:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('senha', array('label' => 'Senha:', 'class' => 'form-control', 'type' => 'password')); ?>
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>

