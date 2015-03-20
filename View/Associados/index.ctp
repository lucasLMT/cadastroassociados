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
	                    <th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('endereco'); ?></th>
						<th><?php echo $this->Paginator->sort('bairro'); ?></th>
						<th><?php echo $this->Paginator->sort('CEP'); ?></th>
						<th><?php echo $this->Paginator->sort('dataDeAdmissao'); ?></th>
						<th><?php echo $this->Paginator->sort('dataDeNascimento'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('RG'); ?></th>
						<th><?php echo $this->Paginator->sort('estado civil'); ?></th>
						<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
						<th><?php echo $this->Paginator->sort('area_id'); ?></th>
						<th><?php echo $this->Paginator->sort('salario'); ?></th>
						<th><?php echo $this->Paginator->sort('valor adicional'); ?></th>
						<th><?php echo $this->Paginator->sort('mensalidade'); ?></th>
						<th><?php echo $this->Paginator->sort('mensagem'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
	            </thead>
	            <tbody>
					<?php foreach ($associados as $associado): ?>
					<tr class="odd gradeX">
						<td><?php echo h($associado['Associado']['id']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['endereco']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['bairro']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['CEP']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['dataDeAdmissao']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['dataDeNascimento']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['telefone']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['RG']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['estado civil']); ?>&nbsp;</td>
						<td><?php echo h($associado['Cargo']['id']); ?>&nbsp;</td>
						<td><?php echo h($associado['Area']['id']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['salario']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['valor adicional']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['mensalidade']); ?>&nbsp;</td>
						<td><?php echo h($associado['Associado']['mensagem']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $associado['Associado']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $associado['Associado']['id']), array(), __('Are you sure you want to delete # %s?', $associado['Associado']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>

