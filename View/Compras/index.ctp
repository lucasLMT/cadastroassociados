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
						<th><?php echo $this->Paginator->sort('Matrícula'); ?></th>
            <th><?php echo $this->Paginator->sort('associado_id'); ?></th>
						<th><?php echo $this->Paginator->sort('Convênio'); ?></th>
						<th><?php echo $this->Paginator->sort('referência'); ?></th>
						<th><?php echo $this->Paginator->sort('observação'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($compras as $compra): ?>
					<tr class="odd gradeX">
						<td><?php echo h($compra['Associado']['matricula']); ?>&nbsp;</td>
            <td><?php echo h($compra['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($compra['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['referencia']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['observacao']); ?>&nbsp;</td>
						<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $compra['Compra']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $compra['Compra']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover a compra %s do associado %s ?',
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
