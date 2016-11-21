<br>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Associado
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Matrícula'); ?></th>
                    <th><?php echo $this->Paginator->sort('Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('Telefone'); ?></th>
                    <th><?php echo $this->Paginator->sort('Cargo'); ?></th>
                    <th><?php echo $this->Paginator->sort('Área'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $associado): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($associado['Associado']['matricula']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Associado']['telefone']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Cargo']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Area']['nome']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $associado['Associado']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $associado['Associado']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover associado %s?',
                                    $associado['Associado']['nome'])); ?>
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
    echo $this->Paginator->prev('< ' . __('Anterior '), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ' '));
    echo $this->Paginator->next(__(' Próximo') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>
