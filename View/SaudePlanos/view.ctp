<div class="saudePlanos view">
<h2><?php echo __('Saude Plano'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ValorAssociado'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['valorAssociado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ValorSebrae'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['valorSebrae']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ValorAFSebrae'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['valorAFSebrae']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacao'); ?></dt>
		<dd>
			<?php echo h($saudePlano['SaudePlano']['observacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Saude Plano'), array('action' => 'edit', $saudePlano['SaudePlano']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Saude Plano'), array('action' => 'delete', $saudePlano['SaudePlano']['id']), array(), __('Are you sure you want to delete # %s?', $saudePlano['SaudePlano']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Saude Planos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saude Plano'), array('action' => 'add')); ?> </li>
	</ul>
</div>
