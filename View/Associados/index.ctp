<br>
<div class="search">
    <?= $this->Form->create(null, ['action' => 'search']) ?>
    <?= $this->Form->input('Busca', array('label' => '',
        'class' => 'form-control',
        'rows' => '1',
        'required' => true,
        'style' => 'width:400px; float:left',
        'div' => false,
        'placeholder' => 'Buscar associado')) ?>
    <?= $this->Form->button('Buscar', array('class' => 'btn btn-info', 'role' => 'button', 'div' => false)) ?>
    <?= $this->Form->end() ?>
</div>

<?php
echo $this->Html->link(
    'Mostrar todos os associados',
    array(
        'controller' => 'Associados',
        'action' => 'todosAssociados',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-warning',
        'role' => 'button'
    )
);
?>
<?php
echo $this->Html->link(
    'Cadastrar um novo associado',
    array(
        'controller' => 'Associados',
        'action' => 'add',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-success',
        'role' => 'button'
    )
);
?>
<?php
echo $this->Html->link(
    'Aniversariantes',
    array(
        'controller' => 'Associados',
        'action' => 'listaAniversario',
        'full_base' => true
    ),
    array(
        'class' => 'btn btn-danger',
        'role' => 'button'
    )
);
?>
