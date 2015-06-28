<br>
<?php 
    echo $this->Html->link(
        'Cadastrar uma nova linha',
        array(
            'controller' => 'LinhasTelefonicas',
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
	    Linhas telefônicas
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
						<th><?php echo $this->Paginator->sort('associado_id'); ?></th>
						<th><?php echo $this->Paginator->sort('Operadora'); ?></th>
						<th><?php echo $this->Paginator->sort('Numero'); ?></th>
						<th><?php echo $this->Paginator->sort('modelo'); ?></th>
						<th><?php echo $this->Paginator->sort('data'); ?></th>
						<th><?php echo $this->Paginator->sort('devolucao'); ?></th>
						<th><?php echo $this->Paginator->sort('observacao'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($linhasTelefonicas as $linhasTelefonica): ?>
					<tr class="odd gradeX">
						<td><?php echo h($linhasTelefonica['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['Operadora']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['Numero']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['modelo']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['data']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['devolucao']); ?>&nbsp;</td>
						<td><?php echo h($linhasTelefonica['LinhasTelefonica']['observacao']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $linhasTelefonica['LinhasTelefonica']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $linhasTelefonica['LinhasTelefonica']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover a linha de número %s ?', $linhasTelefonica['LinhasTelefonica']['Numero'])); ?>
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
