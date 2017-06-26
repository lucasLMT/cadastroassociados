<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Relatório: Compras por Convênio
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('ListaCompra'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('convenio_id', array('label' => 'Convênio', 'class' => 'form-control', 'empty' => '')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('associado_id', array('label' => 'Associado', 'class' => 'form-control', 'empty' => '')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('periodo_id', array('label' => 'Período', 'class' => 'form-control', 'empty' => '')); ?>
                </div>
                <table width="100%" cellpadding="5px">
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php echo $this->Form->input('modo_id', array('label' => 'Modo*', 'class' => 'form-control', 'empty' => '', 'required' => true)); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $this->Form->input('todos', array('label' => 'Trazer todos:', 'class' => 'form-control')); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php echo $this->Form->input('data_inicial', array('label' => 'Data Inicial', 'class' => 'form-control date', 'empty' => '')); ?>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <?php echo $this->Form->input('data_final', array('label' => 'Data Final', 'class' => 'form-control date', 'empty' => '')); ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-default">Buscar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
