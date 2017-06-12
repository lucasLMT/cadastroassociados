<br>
<?php
echo $this->Html->link(
    'Cadastrar uma nova operadora',
    array(
        'controller' => 'Operadoras',
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
                    <th><?php echo $this->Paginator->sort('nome'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($operadoras as $operadora): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($operadora['Operadora']['nome']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $operadora['Operadora']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $operadora['Operadora']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover a operadora %s?',
                                    $operadora['Operadora']['nome'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Página {:page} de {:pages}, exibindo {:current} registros de {:count} no total, registro inicial {:start}, registro final {:end}')
    ));
    ?>
</p>
<div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('Anterior   '), array('class' => 'btn btn-default',
                            'role' => 'button'), null, array('class' => 'btn btn-default disabled', 'role' => 'button'));
    echo $this->Paginator->numbers(array('separator' => '   '));
    echo $this->Paginator->next(__('   Próximo') . ' >', array('class' => 'btn btn-default',
                            'role' => 'button'), null, array('class' => 'btn btn-default disabled', 'role' => 'button'));
    ?>
</div>
