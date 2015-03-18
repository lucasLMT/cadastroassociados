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
	                    <th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('razaoSocial'); ?></th>
						<th><?php echo $this->Paginator->sort('rua'); ?></th>
						<th><?php echo $this->Paginator->sort('bairro'); ?></th>
						<th><?php echo $this->Paginator->sort('cidade'); ?></th>
						<th><?php echo $this->Paginator->sort('CEP'); ?></th>
						<th><?php echo $this->Paginator->sort('telefone'); ?></th>
						<th><?php echo $this->Paginator->sort('fax'); ?></th>
						<th><?php echo $this->Paginator->sort('percDesc'); ?></th>
						<th><?php echo $this->Paginator->sort('contato'); ?></th>
						<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
						<th><?php echo $this->Paginator->sort('nomeDoGrupo'); ?></th>
						<th><?php echo $this->Paginator->sort('status'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($convenios as $convenio): ?>
					<tr class="odd gradeX">
						<td><?php echo h($convenio['Convenio']['id']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['razaoSocial']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['rua']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['bairro']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['cidade']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['CEP']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['telefone']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['fax']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['percDesc']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['contato']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Grupo']['id']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['nomeDoGrupo']); ?>&nbsp;</td>
						<td><?php echo h($convenio['Convenio']['status']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $convenio['Convenio']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $convenio['Convenio']['id']), array(), __('Are you sure you want to delete # %s?', $convenio['Convenio']['id'])); ?>
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