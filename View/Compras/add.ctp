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
                    <div class="input textarea">
                        <label>Sub Total</label>
                        <textarea class="form-control" rows="1" cols="30" id="subtotal"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('date', array('label' => 'Data', 'class' => 'form-control date', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('convenio_id', array('label' => 'Convênio', 'class' => 'form-control', 'empty'=>'')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('associado_id', array('label' => 'Nome', 'class' => 'form-control','empty' => '')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->radio('quantidade',[1,2,3,4,5,6,7,8,9,10]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('valor', array('label' => 'Valor (Exemplo 1234.56)', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'form-control', 'rows' => '4')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('periodo_id', array('label' => 'Período', 'class' => 'form-control','empty' => '')); ?>
                </div>                
                <button type="submit" class="btn btn-success" id="add">Adicionar</button>                
                <?php
                    echo $this->Html->link(
                        'Voltar',
                        array(
                            'controller' => 'Compras',
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
