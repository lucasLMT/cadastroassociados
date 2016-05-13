<br>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Aniversariantes de <?php echo date("M-Y");?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th><?php echo __('Associado'); ?></th>
                    <th><?php echo __('Data'); ?></th>
                    <th><?php echo __('Unidade'); ?></th>
                    <!--<th class="actions"><?php echo __('Gerenciamento'); ?></th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($aniversariantes as $associado): ?>
                    <tr class="odd gradeX">
                        <td><?php echo h($associado['Associado']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Associado']['dataDeNascimento']); ?>&nbsp;</td>
                        <td><?php echo h($associado['Area']['nome']); ?>&nbsp;</td>
                        <!--<td class="actions">
                            <?php echo $this->Html->link(__('Email'), array('action' => 'sendEmail', $associado['Associado']['id']),
                                array('class' => 'btn btn-warning', 'role' => 'button')); ?>
                        </td>-->
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<p>
