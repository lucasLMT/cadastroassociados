<div class="refeitorios view">
    <h2><?php echo __('Refeitorio'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Associado'); ?></dt>
        <dd>
            <?php echo $this->Html->link($refeitorio['Associado']['nome'], array('controller' => 'associados', 'action' => 'view', $refeitorio['Associado']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Data'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['data']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Qtd Associado'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['qtd_associado']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Qtd Convidado'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['qtd_convidado']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Preco Asc'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['preco_asc']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Preco Conv'); ?></dt>
        <dd>
            <?php echo h($refeitorio['Refeitorio']['preco_conv']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Refeitorio'), array('action' => 'edit', $refeitorio['Refeitorio']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Refeitorio'), array('action' => 'delete', $refeitorio['Refeitorio']['id']), array(), __('Are you sure you want to delete # %s?', $refeitorio['Refeitorio']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Refeitorios'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Refeitorio'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
    </ul>
</div>
