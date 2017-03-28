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
        function FormatNumber(number, c, d, t){
            var n = number,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "," : t,
                s = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return 'R$ ' + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

        $().ready(function () {
            //$("#AssociadoEndereco").mask("99/99/9999");
            $('.date').mask('99-99-9999');
            $('.cpf').mask('999.999.999-99');
            $('.cep').mask('99.999-999');

            if (localStorage['cacheConvenio']) {
                $('#CompraConvenioId').val(localStorage['cacheConvenio']);
            };

            if (localStorage['cachePeriodo']) {
                $('#CompraPeriodoId').val(localStorage['cachePeriodo']);
            };

            if (localStorage['subtotal']) {
                $('#subtotal').val(FormatNumber(parseFloat(localStorage['subtotal']), 2, ',', '.'));
            } else {
                localStorage['subtotal'] = 0;
                $('#subtotal').val(FormatNumber(0, 2, ',', '.'));
            }

            $(".salario").blur(function (){
                if (($('.salario').val() != "") && ($('.salario').val() != 0)) {
                    $('.mensalidade').val($('.salario').val() * 0.09);
                } else {
                    $('.mensalidade').val('');
                }
            });

            $('#CompraConvenioId').blur(function (){
                if (localStorage['cacheConvenio'] != $('#CompraConvenioId').find(':selected').val()) {
                    $('#subtotal').val(FormatNumber(0, 2, ',', '.'));
                };
            });

            $('#CompraPeriodoId').blur(function (){
                if (localStorage['cachePeriodo'] != $('#CompraPeriodoId').find(':selected').val()) {
                    $('#subtotal').val(FormatNumber(0, 2, ',', '.'));
                };
            });

            $('#btn').click(function (){
                if (localStorage['cacheConvenio'] && localStorage['cachePeriodo']) {
                    if ((localStorage['cacheConvenio'] == $('#CompraConvenioId').find(':selected').val()) &&
                        (localStorage['cachePeriodo'] == $('#CompraPeriodoId').find(':selected').val())) {
                        localStorage['subtotal'] = parseFloat(localStorage['subtotal']) + parseFloat($('#CompraValor').val());
                    } else {
                        localStorage['subtotal'] = parseFloat($('#CompraValor').val());
                    }
                } else {
                    localStorage['subtotal'] = parseFloat(localStorage['subtotal']) + parseFloat($('#CompraValor').val());
                }
                localStorage['cacheConvenio'] = $('#CompraConvenioId').find(':selected').val();
                localStorage['cachePeriodo'] = $('#CompraPeriodoId').find(':selected').val();
            })

            $("#CompraValor").focus(function(){
                var quantidade = $("input[type='radio']:checked").val();
                var associadoId = $("select[name='data[Compra][associado_id]']").val();
                var convenioId = $("selct[name='data[Compra][convenio_id]']").val();
                if (convenioId = 24) {
                    $.ajax({
                        type: "GET", //se eu colocar tipo POST da erro
                        url : '<?php echo Router::url(array('controller' => 'compras', 'action' => 'add')); ?>',
                        data: {
                            quantidade : quantidade,
                            associadoId: associadoId
                        },
                        //dataType: "json", //se colocar o dataType da erro
                        success : function(html, textStatus, data) {
                            $("#CompraValor").val(parseFloat(html));
                        },
                        error : function(xhr, textStatus, errorThrown) {
                            alert('An error occurred! ' + errorThrown);
                        }
                    });
                    
            });

        });
    </script>

</head>	