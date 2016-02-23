<div class="operadoras view">
    <h2><?php echo __('Operadora'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($operadora['Operadora']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($operadora['Operadora']['nome']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Operadora'), array('action' => 'edit', $operadora['Operadora']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Operadora'), array('action' => 'delete', $operadora['Operadora']['id']), array(), __('Are you sure you want to delete # %s?', $operadora['Operadora']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Operadoras'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Operadora'), array('action' => 'add')); ?> </li>
    </ul>
</div>
