<div class="linhasTelefonicas view">
<h2><?php echo __('Linhas Telefonica'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operadora'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['Operadora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['Numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['modelo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imei'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['imei']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notafiscal'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['notafiscal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Devolucao'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['devolucao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Associado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($linhasTelefonica['Associado']['nome'], array('controller' => 'associados', 'action' => 'view', $linhasTelefonica['Associado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($linhasTelefonica['LinhasTelefonica']['observacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Linhas Telefonica'), array('action' => 'edit', $linhasTelefonica['LinhasTelefonica']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Linhas Telefonica'), array('action' => 'delete', $linhasTelefonica['LinhasTelefonica']['id']), array(), __('Are you sure you want to delete # %s?', $linhasTelefonica['LinhasTelefonica']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Linhas Telefonicas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Linhas Telefonica'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
	</ul>
</div>
