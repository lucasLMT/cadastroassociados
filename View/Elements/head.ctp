<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');

    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css(
        array(
            'template/metisMenu.min.css',
            'template/timeline.css',
            'template/sb-admin-2.css',
            'template/font-awesome.min.css'
        )
    );
    echo $this->fetch('css');

    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('mask');
    echo $this->Html->script(
        array(
            'template/metisMenu.min.js',
            'template/sb-admin-2.js',
            'template/holder.js'
        )
    );
    ?>
    <script type="text/javascript">
        $().ready(function () {
            //$("#AssociadoEndereco").mask("99/99/9999");
            $(".date").mask("99-99-9999");
            $(".cpf").mask("999.999.999-99");
            $(".cep").mask("99.999-999");

            $(".salario").blur(function (){
                if (($(".salario").val() != "") && ($(".salario").val() != 0)) {
                    $(".mensalidade").val($(".salario").val() * 0.09);
                } else {
                    $(".mensalidade").val("");
                }
            });
        });
    </script>

</head>	