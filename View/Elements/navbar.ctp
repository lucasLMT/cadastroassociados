<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Cadastro Associados</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>
                                <?php
                                    echo $current_user['login'];
                                ?>
                            </a>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Configurações',
                                    array(
                                        'controller' => 'Users',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Sair',
                                    array(
                                        'controller' => 'Users',
                                        'action' => 'logout',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gerenciamento<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Áreas',
                                    array(
                                        'controller' => 'Areas',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Cargos',
                                    array(
                                        'controller' => 'Cargos',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Convênios',
                                    array(
                                        'controller' => 'Convenios',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Associados',
                                    array(
                                        'controller' => 'Associados',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>                        
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Compras',
                                    array(
                                        'controller' => 'Compras',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Planos de saúde',
                                    array(
                                        'controller' => 'saudePlanos',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Linhas telefônicas',
                                    array(
                                        'controller' => 'LinhasTelefonicas',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Operadoras telefônicas',
                                    array(
                                        'controller' => 'Operadoras',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Relatório das linhas',
                                    array(
                                        'controller' => 'LinhasTelefonicas',
                                        'action' => 'formLinhas',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Períodos',
                                    array(
                                        'controller' => 'Periodos',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Compras Associados',
                                    array(
                                        'controller' => 'ListaCompra',
                                        'action' => 'formAssociado',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Compras Convênios',
                                    array(
                                        'controller' => 'ListaCompra',
                                        'action' => 'formConvenio',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Devedores',
                                    array(
                                        'controller' => 'ListaCompra',
                                        'action' => 'formDevedores',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(
                                    'Refeitório',
                                    array(
                                        'controller' => 'Refeitorios',
                                        'action' => 'index',
                                        'full_base' => true
                                    )
                                );
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
