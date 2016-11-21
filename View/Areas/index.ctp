<br>
<div class="search">
    <?= $this->Form->create(null, ['action' => 'search']) ?>
    <?= $this->Form->input('Busca', array('label' => '',
        'class' => 'form-control',
        'rows' => '1',
        'required' => true,
        'style' => 'width:400px; float:left',
        'div' => false,
        'placeholder' => 'Buscar area')) ?>
    <?= $this->Form->button('Buscar', array('class' => 'btn btn-info', 'role' => 'button', 'div' => false)) ?>
    <?= $this->Form->end() ?>
</div>

<?php
echo $this->Html->link(
    'Cadastrar uma nova área',
    array(
        'controller' => 'Areas',
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
        Áreas
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Nome'); ?></th>
                    <th><?php echo $this->Paginator->sort('Refeição Técnico'); ?></th>
                    <th><?php echo $this->Paginator->sort('Refeição Analista'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($areas as $area): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($area['Area']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($area['Area']['reftec']); ?>&nbsp;</td>
                        <td><?php echo h($area['Area']['refanalist']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $area['Area']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $area['Area']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover %s?',
                                    $area['Area']['nome'])); ?>
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
