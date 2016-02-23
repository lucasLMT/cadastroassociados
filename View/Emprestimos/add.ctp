<div class="emprestimos form">
    <?php echo $this->Form->create('Emprestimo'); ?>
    <fieldset>
        <legend><?php echo __('Add Emprestimo'); ?></legend>
        <?php
        echo $this->Form->input('titulo');
        echo $this->Form->input('associado_id');
        echo $this->Form->input('data');
        echo $this->Form->input('referencia');
        echo $this->Form->input('valor');
        echo $this->Form->input('observavao');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Emprestimos'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Associados'), array('controller' => 'associados', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Associado'), array('controller' => 'associados', 'action' => 'add')); ?> </li>
    </ul>
</div>
