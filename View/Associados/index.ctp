<br>
<?php
    echo $this->Html->link(
        'Cadastrar um novo associado',
        array(
            'controller' => 'Associados',
            'action' => 'add',
            'full_base' => true
        ),
        array(
        	'class' => 'btn btn-warning',
            'role' => 'button'
        	)
    );
?>
<?php
    echo $this->Html->link(
        'Aniversariantes',
        array(
            'controller' => 'Associados',
            'action' => 'listaAniversario',
            'full_base' => true
        ),
        array(
        	'class' => 'btn btn-info',
            'role' => 'button'
        	)
    );
?>
<br>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
	    Associados
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
						<th><?php echo $this->Paginator->sort('matricula','Matrícula'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
						<th><?php echo $this->Paginator->sort('salario', 'Salário'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
					</tr>
	            </thead>
	            <tbody>
					<?php foreach ($associados as $associado): ?>
					<tr class="odd gradeX">
						<td><?php echo h($associado['Associado']['matricula']); ?>&nbsp;</td>
            <td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['telefone']); ?>&nbsp;</td>
						<td><?php echo h($associado['Cargo']['nome']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['salario']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $associado['Associado']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $associado['Associado']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover associado %s?',
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
