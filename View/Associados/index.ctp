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
        	'class' => 'btn btn-success',
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
						<th><?php echo $this->Paginator->sort('Matrícula'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
						<th><?php echo $this->Paginator->sort('area_id'); ?></th>
						<th><?php echo $this->Paginator->sort('salario'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
					</tr>
	            </thead>
	            <tbody>
					<?php foreach ($associados as $associado): ?>
					<tr class="odd gradeX">
						<td><?php echo h($associado['Associado']['matricula']); ?>&nbsp;</td>
            <td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['telefone']); ?>&nbsp;</td>
						<td><?php echo h($associado['Cargo']['id']); ?>&nbsp;</td>
						<td><?php echo h($associado['Area']['id']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['salario']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $associado['Associado']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Html->link(__('Compras'), array('action' => 'listaCompras', $associado['Associado']['id']),
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
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
?>
</p>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next(__(' próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>
