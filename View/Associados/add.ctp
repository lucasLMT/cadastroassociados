<br>
<div class="panel panel-default">
    <div class="panel-heading">
        Adicionar associado
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->create('Associado'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('matricula', array('label' => 'Matrícula:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('dataDeNascimento', array('label' => 'Data de nascimento:', 'class' => 'form-control date', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('sexo_id', array('label' => 'Sexo:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('endereco', array('label' => 'Endereço:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('bairro', array('label' => 'Bairro:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('CEP', array('label' => 'CEP:', 'class' => 'form-control cep', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('dataDeAdmissao', array('label' => 'Data de admissão:', 'class' => 'form-control date', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('dataDesligamento', array('label' => 'Data de desligamento:', 'class' => 'form-control date', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('telefone', array('label' => 'Telefone:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('label' => 'Email:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('RG', array('label' => 'RG:', 'class' => 'form-control', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('cpf', array('label' => 'CPF:', 'class' => 'form-control cpf', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('estadocivil_id', array('label' => 'Estado civil:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('cargo_id', array('label' => 'Cargo:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('area_id', array('label' => 'Área:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('salario', array('label' => 'Salário: (Exemplo 1234.56)', 'class' => 'form-control salario', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('mensalidade', array('label' => 'Contribuição:', 'class' => 'form-control mensalidade', 'rows' => '1')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('ativo_id', array('label' => 'Status:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('filho_id', array('label' => 'Filhos:', 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('mensagem', array('label' => 'Mensagem:', 'class' => 'form-control', 'rows' => '4')); ?>
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
                <button type="reset" class="btn btn-default">Limpar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
