<br>
<div class="search">
    <?= $this->Form->create(null, ['action' => 'search']) ?>
    <?= $this->Form->input('Busca', array('label' => '',
        'class' => 'form-control',
        'rows' => '1',
        'required' => true,
        'style' => 'width:400px; float:left',
        'div' => false,
        'placeholder' => 'Buscar compras do associado')) ?>
    <?= $this->Form->button('Buscar', array('class' => 'btn btn-info', 'role' => 'button', 'div' => false)) ?>
    <?= $this->Form->end() ?>
</div>
<?php
echo $this->Html->link(
    'Mostrar todas as compras',
    array(
        'controller' => 'Compras',
        'action' => 'todasCompras',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-info',
        'role' => 'button'
    )
);
?>
<?php
echo $this->Html->link(
    'Cadastrar uma nova compra',
    array(
        'controller' => 'Compras',
        'action' => 'add',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-success',
        'role' => 'button'
    )
);
?>
