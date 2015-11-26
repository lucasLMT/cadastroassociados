<br>
<?php
    echo $this->Html->link(
        'Cadastrar um novo plano',
        array(
            'controller' => 'SaudePlanos',
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
	    Planos de saúde
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('tipo'); ?></th>
						<th><?php echo $this->Paginator->sort('valorAssociado', 'Valor Associado'); ?></th>
						<th><?php echo $this->Paginator->sort('valorSebrae', 'Valor Sebrae'); ?></th>
						<th><?php echo $this->Paginator->sort('valorAFSebrae', 'Valor AFSebrae'); ?></th>
						<th><?php echo $this->Paginator->sort('observacao', 'Observação'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($saudePlanos as $saudePlano): ?>
					<tr class="odd gradeX">
						<td><?php echo h($saudePlano['SaudePlano']['nome']); ?>&nbsp;</td>
						<td><?php echo h($saudePlano['SaudePlano']['tipo']); ?>&nbsp;</td>
            <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                  $valorAssociado = $this->Number->currency($saudePlano['SaudePlano']['valorAssociado'],'BRL' );
                  $valorSebrae = $this->Number->currency($saudePlano['SaudePlano']['valorSebrae'],'BRL' );
                  $valorAFSebrae = $this->Number->currency($saudePlano['SaudePlano']['valorAFSebrae'],'BRL' );
            ?>
            <td><?php echo h($valorAssociado); ?>&nbsp;</td>
						<td><?php echo h($valorSebrae); ?>&nbsp;</td>
						<td><?php echo h($valorAFSebrae); ?>&nbsp;</td>
						<td><?php echo h($saudePlano['SaudePlano']['observacao']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $saudePlano['SaudePlano']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $saudePlano['SaudePlano']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover o plano %s ?', $saudePlano['SaudePlano']['nome'])); ?>
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
