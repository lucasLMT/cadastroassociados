<br>
<?php
    echo $this->Html->link(
        'Cadastrar um novo almoço',
        array(
            'controller' => 'Refeitorios',
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
	    Almoços
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	    <div class="dataTable_wrapper">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	            <thead>
	                <tr>
						<th><?php echo $this->Paginator->sort('associado_id'); ?></th>
						<th><?php echo $this->Paginator->sort('data'); ?></th>
						<th><?php echo $this->Paginator->sort('qtd_associado', 'Quantidade'); ?></th>
						<th><?php echo $this->Paginator->sort('qtd_convidado', 'Quantidade convidado'); ?></th>
						<th><?php echo $this->Paginator->sort('preco_asc', 'Preço associado'); ?></th>
						<th><?php echo $this->Paginator->sort('preco_conv', 'Preço convidado'); ?></th>
						<th class="actions"><?php echo __('Gerenciamento'); ?></th>
	                </tr>
	            </thead>
	            <tbody>
					<?php foreach ($refeitorios as $refeitorio): ?>
					<tr class="odd gradeX">
						<td><?php echo h($refeitorio['Associado']['nome']); ?>&nbsp;</td>
						<td><?php echo h($refeitorio['Refeitorio']['data']); ?>&nbsp;</td>
						<td><?php echo h($refeitorio['Refeitorio']['qtd_associado']); ?>&nbsp;</td>
						<td><?php echo h($refeitorio['Refeitorio']['qtd_convidado']); ?>&nbsp;</td>
            <?php $this->Number->addFormat('BRL', array('before'=> 'R$', 'thousands' => '.', 'decimals' => ','));
                  $preco_asc = $this->Number->currency($refeitorio['Refeitorio']['preco_asc'],'BRL' );
                  $preco_conv = $this->Number->currency($refeitorio['Refeitorio']['preco_conv'],'BRL' );
            ?>
            <td><?php echo h($preco_asc); ?>&nbsp;</td>
						<td><?php echo h($preco_conv); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $refeitorio['Refeitorio']['id']),
							array('class' => 'btn btn-warning btn-sm','role' => 'button')); ?>
							<?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $refeitorio['Refeitorio']['id']),
							array('class' => 'btn btn-danger btn-sm','role' => 'button'), __('Você tem certeza que deseja remover este registro?')); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
	        </table>
	    </div>
	</div>
	<!-- /.panel-body -->
</div>
