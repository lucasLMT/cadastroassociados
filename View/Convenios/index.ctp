<br>
<?php
    echo $this->Html->link(
        'Cadastrar um novo convênio',
        array(
            'controller' => 'Convenios',
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
	    Convenios
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
	                	<th><?php echo $this->Paginator->sort('razaoSocial', 'Convênio'); ?></th>
						        <th><?php echo $this->Paginator->sort('matricula', 'Matrícula'); ?></th>
						        <th><?php echo $this->Paginator->sort('percDesc', 'Per desconto'); ?></th>
						        <th><?php echo $this->Paginator->sort('contato'); ?></th>
						        <th><?php echo $this->Paginator->sort('status'); ?></th>
						        <th class="actions"><?php echo __('Gerenciamento'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($convenios as $convenio): ?>
					<tr class="odd gradeX">
						<td><?php echo h($convenio['Convenio']['razaoSocial']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['matricula']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['percDesc']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['contato']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['statu_id']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $convenio['Convenio']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $convenio['Convenio']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover %s?',
							$convenio['Convenio']['nomeDoGrupo'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
	        </table>
	    </div>
	</div>
	<!-- /.panel-body -->
</div>
