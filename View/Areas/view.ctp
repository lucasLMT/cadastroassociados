<div class="areas view">
    <h2><?php echo __('Area'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($area['Area']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nome'); ?></dt>
        <dd>
            <?php echo h($area['Area']['nome']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Area'), array('action' => 'edit', $area['Area']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Remover Area'), array('action' => 'delete', $area['Area']['id']), array(), __('Você tem certeza que deseja remover %s?', $area['Area']['nome'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Areas'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Area'), array('action' => 'add')); ?> </li>
    </ul>
</div>
