<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar almoço
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Refeitorio'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('associado_id', array('label' => 'Associado:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('data', array('label' => 'Data:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <!--
                <div class="form-group">
                    <?php //echo $this->Form->input('qtd_associado', array('label' => 'Quantidade, valor associado:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>-->
                <div class="form-group">
                    <?php echo $this->Form->input('qtd_convidado', array('label' => 'Quantidade, valor convidado:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <!--
                <div class="form-group">
                    <?php// echo $this->Form->input('total', array('label' => 'Preço associado: (Exemplo 1234.56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php// echo $this->Form->input('preco_conv', array('label' => 'Preço convidado: (Exemplo 1234.56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>-->
                <button type="submit" class="btn btn-default">Adicionar</button>
                <?php
                    echo $this->Html->link(
                        'Voltar',
                        array(
                            'controller' => 'Refeitorios',
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
