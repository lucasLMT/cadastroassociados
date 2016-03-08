<br>
<?php
echo $this->Html->link(
    'Cadastrar uma nova compra',
    array(
        'controller' => 'Compras',
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
        Compras
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('matricula', 'Matrícula'); ?></th>
                    <th><?php echo $this->Paginator->sort('associado_id', 'Associado'); ?></th>
                    <th><?php echo $this->Paginator->sort('convenio_id', 'Convênio'); ?></th>
                    <th><?php echo $this->Paginator->sort('descricao', 'Descrição'); ?></th>
                    <th><?php echo $this->Paginator->sort('referencia', 'Referência'); ?></th>
                    <th><?php echo $this->Paginator->sort('periodo', 'Período')?></th>
                    <th><?php echo $this->Paginator->sort('valor'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($compras as $compra): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($compra['Associado']['matricula']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Convenio']['razaoSocial']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Compra']['descricao']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Periodo']['referencia']); ?>&nbsp;</td>
                        <td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $compra['Compra']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $compra['Compra']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover a compra %s do associado %s ?',
                                    $compra['Compra']['id'], $compra['Compra']['nomeAssociado'])); ?>
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
