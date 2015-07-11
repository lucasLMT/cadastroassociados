<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 */
class ListaCompraController extends AppController
{
    public $useModel = false;

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    var $helpers = array('xls');

    /**
     * index method
     *
     * @return void
     */
    public function listaAssociado($data_inicio, $data_fim, $associado, $modo, $todos)
    {
        if (($modo == 1) && !$todos) {
            $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
                'Compra.referencia <= ' => $data_fim,
                'Compra.associado_id' => $associado));
        } else {
            $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
                'Compra.referencia <= ' => $data_fim),
                'order' => array('Compra.associado_id'));
        }
        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'data_inicio', 'data_fim', 'associado', 'total', 'modo', 'todos'));
    }

    public function formAssociado($id = null)
    {

        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
            $date = $this->ListaCompra->Periodo->find('all', $date_conditions);

            $data_inicio = $date[0]['Periodo']['data_inicial'];
            $data_fim = $date[0]['Periodo']['data_final'];

            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaAssociado', $data_inicio, $data_fim,
                $data['ListaCompra']['associado_id'],
                $data['ListaCompra']['modo_id'],
                $data['ListaCompra']['todos']));
        }
        $associados = $this->ListaCompra->Associado->find('list');
        $periodos = $this->ListaCompra->Periodo->find('list');
        $modos = $model->getModeList();
        $this->set(compact('associados', 'periodos', 'modos'));
    }

    public function listaConvenio($data_inicio, $data_fim, $convenio, $modo, $todos)
    {

        if (($modo == 1) && !$todos) {
            $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
                'Compra.referencia <= ' => $data_fim,
                'Compra.convenio_id' => $convenio));
        } else {
            $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
                'Compra.referencia <= ' => $data_fim),
                'order' => array('Compra.convenio_id'));
        }
        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'data_inicio', 'data_fim', 'convenio', 'total', 'modo', 'todos'));

    }

    public function formConvenio($id = null)
    {

        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
            $date = $this->ListaCompra->Periodo->find('all', $date_conditions);

            $data_inicio = $date[0]['Periodo']['data_inicial'];
            $data_fim = $date[0]['Periodo']['data_final'];

            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaConvenio', $data_inicio, $data_fim,
                $data['ListaCompra']['convenio_id'],
                $data['ListaCompra']['modo_id'],
                $data['ListaCompra']['todos']));
        }
        $convenios = $this->ListaCompra->Convenio->find('list');
        $periodos = $this->ListaCompra->Periodo->find('list');
        $modos = $model->getModeList();
        $this->set(compact('convenios', 'periodos', 'modos'));
    }

    public function listaDevedores($data_inicio, $data_fim)
    {

        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim),
            'order' => array('Compra.associado_id'));

        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'data_inicio', 'data_fim', 'total'));

    }

    public function formDevedores()
    {

        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
            $date = $this->ListaCompra->Periodo->find('all', $date_conditions);

            $data_inicio = $date[0]['Periodo']['data_inicial'];
            $data_fim = $date[0]['Periodo']['data_final'];

            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaDevedores', $data_inicio, $data_fim));

        }
        $periodos = $this->ListaCompra->Periodo->find('list');
        $this->set(compact('periodos'));
    }

    public function viewpdf_compras_analiticas($data_inicio, $data_fim, $associado)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.associado_id' => $associado));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('compras', 'total'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_compras_analiticas');
    }

    public function viewpdf_compras_sinteticas($data_inicio, $data_fim, $associado)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.associado_id' => $associado),
            'order' => array('Compra.convenio_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        $assoc_tmp = $compras[0]['Associado']['nome'];
        $count = Count($compras);
        $i = 1;
        foreach ($compras as $compra):
            if (($assoc_tmp <> $compra['Associado']['nome']) || ($count == $i)) {
                if ($count == $i && $assoc_tmp == $compra['Associado']['nome'])
                    $total += $compra['Compra']['valor'];
                $assoc_tmp;
                $total;
                $associadosArray[$i - 1] = array('matricula' => $compra['Associado']['matricula'],
                    'associado' => $compra['Associado']['nome'], 'total' => $total);
                $total = $compra['Compra']['valor'] + 0;
                if (($assoc_tmp <> $compra['Associado']['nome']) && ($count == $i)) {
                    $associadosArray[$i - 1] = array('matricula' => $compra['Associado']['matricula'],
                        'associado' => $compra['Associado']['nome'], 'total' => $total);
                }
                $assoc_tmp = $compra['Associado']['nome'];
            } else {
                $total += $compra['Compra']['valor'];
            }

            $i++;
        endforeach;

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('associadosArray'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_compras_sinteticas');
    }

    public function viewpdf_convenios_analiticos($data_inicio, $data_fim, $convenio)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.convenio_id' => $convenio));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('compras', 'total'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_convenios_analiticos');
    }

    public function viewpdf_convenios_sinteticos($data_inicio, $data_fim, $convenio)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.convenio_id' => $convenio),
            'order' => array('Compra.associado_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        $convenio_tmp = $compras[0]['Convenio']['nomeDoGrupo'];
        $count = Count($compras);
        $i = 1;
        foreach ($compras as $compra):
            if (($convenio_tmp <> $compra['Convenio']['nomeDoGrupo']) || ($count == $i)) {
                if ($count == $i && $convenio_tmp == $compra['Convenio']['nomeDoGrupo'])
                    $total += $compra['Compra']['valor'];
                $convenio_tmp;
                $total;
                $conveniosArray[$i - 1] = array('convenio' => $compra['Convenio']['nomeDoGrupo'], 'total' => $total);
                $total = $compra['Compra']['valor'] + 0;
                if (($convenio_tmp <> $compra['Convenio']['nomeDoGrupo']) && ($count == $i)) {
                    $conveniosArray[$i - 1] = array('convenio' => $compra['Convenio']['nomeDoGrupo'], 'total' => $total);
                }
                $convenio_tmp = $compra['Convenio']['nomeDoGrupo'];
            } else {
                $total += $compra['Compra']['valor'];
            }

            $i++;
        endforeach;

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('conveniosArray'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_convenios_sinteticos');
    }

    public function export_compras_analiticas($data_inicio, $data_fim, $associado)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.associado_id' => $associado));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'total'));
    }

    public function export_compras_sinteticas($data_inicio, $data_fim, $associado)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.associado_id' => $associado),
            'order' => array('Compra.convenio_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        $assoc_tmp = $compras[0]['Associado']['nome'];
        $count = Count($compras);
        $i = 1;
        foreach ($compras as $compra):
            if (($assoc_tmp <> $compra['Associado']['nome']) || ($count == $i)) {
                if ($count == $i && $assoc_tmp == $compra['Associado']['nome'])
                    $total += $compra['Compra']['valor'];
                $assoc_tmp;
                $total;
                $associadosArray[$i - 1] = array('associado' => $compra['Associado']['nome'], 'total' => $total);
                $total = $compra['Compra']['valor'] + 0;
                if (($assoc_tmp <> $compra['Associado']['nome']) && ($count == $i)) {
                    $associadosArray[$i - 1] = array('associado' => $compra['Associado']['nome'], 'total' => $total);
                }
                $assoc_tmp = $compra['Associado']['nome'];
            } else {
                $total += $compra['Compra']['valor'];
            }

            $i++;
        endforeach;
        //$data = $this->Model->find('all');
        $this->set(compact('associadosArray'));
    }

    public function export_convenios_analiticos($data_inicio, $data_fim, $convenio)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.convenio_id' => $convenio));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'total'));
    }

    public function export_convenios_sinteticos($data_inicio, $data_fim, $convenio)
    {
        $total = 0;
        $options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
            'Compra.referencia <= ' => $data_fim,
            'Compra.convenio_id' => $convenio),
            'order' => array('Compra.associado_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        $convenio_tmp = $compras[0]['Convenio']['nomeDoGrupo'];
        $count = Count($compras);
        $i = 1;
        foreach ($compras as $compra):
            if (($convenio_tmp <> $compra['Convenio']['nomeDoGrupo']) || ($count == $i)) {
                if ($count == $i && $convenio_tmp == $compra['Convenio']['nomeDoGrupo'])
                    $total += $compra['Compra']['valor'];
                $convenio_tmp;
                $total;
                $conveniosArray[$i - 1] = array('convenio' => $compra['Convenio']['nomeDoGrupo'], 'total' => $total);
                $total = $compra['Compra']['valor'] + 0;
                if (($convenio_tmp <> $compra['Convenio']['nomeDoGrupo']) && ($count == $i)) {
                    $conveniosArray[$i - 1] = array('convenio' => $compra['Convenio']['nomeDoGrupo'], 'total' => $total);
                }
                $convenio_tmp = $compra['Convenio']['nomeDoGrupo'];
            } else {
                $total += $compra['Compra']['valor'];
            }

            $i++;
        endforeach;
        //$data = $this->Model->find('all');
        $this->set(compact('conveniosArray'));
    }
}
