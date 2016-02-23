<br>
<?php
echo $this->Html->link(
    'Cadastrar um novo período',
    array(
        'controller' => 'Periodos',
        'action' => 'add',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-success',
        'role' => 'button'
    )
);
?>

<br>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Períodos
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('referencia', 'Referência'); ?></th>
                    <th><?php echo $this->Paginator->sort('data_inicial', 'Data inicial'); ?></th>
                    <th><?php echo $this->Paginator->sort('data_final', 'Data final'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($periodos as $periodo): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($periodo['Periodo']['referencia']); ?>&nbsp;</td>
                        <td><?php echo h($periodo['Periodo']['data_inicial']); ?>&nbsp;</td>
                        <td><?php echo h($periodo['Periodo']['data_final']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $periodo['Periodo']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $periodo['Periodo']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover %s?',
                                    $periodo['Periodo']['referencia'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
