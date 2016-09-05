<br>
<br>

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
