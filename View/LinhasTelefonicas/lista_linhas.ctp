<br>
<div class="panel panel-default">
    <div class="panel-heading">               
       <b> Linha(s) Telefônica(s)  
       <?php if($modo == 1) { 
                echo h($linhasTelefonicas[0]['Associado']['nome']);
             } else if ($modo == 2) {                
                echo h($linhasTelefonicas[0]['LinhasTelefonica']['Numero']);
             } ?> </b>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>                
                    <th><?php echo __('Operadora'); ?></th>
                    <th><?php echo __('Número'); ?></th>
                    <th><?php echo __('Modelo'); ?></th>
                    <th><?php echo __('Data'); ?></th>
                    <th><?php echo __('Devolução'); ?></th>
                    <th><?php echo __('Observação'); ?></th>
                    <th class="actions"><?php echo __('Gerenciamento'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($linhasTelefonicas as $linhasTelefonica): ?>
                    <tr class="odd gradeX">                        
                        <td><?php echo h($linhasTelefonica['Operadora']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($linhasTelefonica['LinhasTelefonica']['Numero']); ?>&nbsp;</td>
                        <td><?php echo h($linhasTelefonica['LinhasTelefonica']['modelo']); ?>&nbsp;</td>
                        <td><?php echo h($linhasTelefonica['LinhasTelefonica']['data']); ?>&nbsp;</td>
                        <td><?php echo h($linhasTelefonica['LinhasTelefonica']['devolucao']); ?>&nbsp;</td>
                        <td><?php echo h($linhasTelefonica['LinhasTelefonica']['observacao']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $linhasTelefonica['LinhasTelefonica']['id']),
                                array('class' => 'btn btn-warning btn-sm', 'role' => 'button')); ?>
                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $linhasTelefonica['LinhasTelefonica']['id']),
                                array('class' => 'btn btn-danger btn-sm', 'role' => 'button'), __('Você tem certeza que deseja remover a linha de número %s ?', $linhasTelefonica['LinhasTelefonica']['Numero'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>                
                </tbody>
            </table>
            <?php
                echo $this->Html->link(
                    'Nova Busca',
                    array(
                        'controller' => 'LinhasTelefonicas',
                        'action' => 'index',
                        'full_base' => true
                    ),
                    array(
                        'class' => 'btn btn-info',
                        'role' => 'button'
                    )
                );
            ?>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
