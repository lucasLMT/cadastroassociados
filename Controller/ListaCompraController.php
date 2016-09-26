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
    public function listaAssociado($periodo, $associado,
                                   $modo, $todos, $referencia)
    {
        if (($modo == 1) && !$todos) {
            $options = array('conditions' => array(
                'Compra.periodo_id' => $periodo,
                'Compra.associado_id' => $associado),
                'order' => array('Compra.referencia'));
        } else {
            $options = array('conditions' => array(
                'Compra.periodo_id' => $periodo),
                'order' => array('Compra.associado_id'));
        }
        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'periodo', 'associado',
            'total', 'modo', 'todos', 'referencia'));
    }

    public function formAssociado($id = null)
    {

        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
            $date = $this->ListaCompra->Periodo->find('all', $date_conditions);

            $referencia = $date[0]['Periodo']['referencia'];

            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaAssociado',
                $data['ListaCompra']['periodo_id'],
                $data['ListaCompra']['associado_id'],
                $data['ListaCompra']['modo_id'],
                $data['ListaCompra']['todos'],
                $referencia));
        }
        $associados = $this->ListaCompra->Associado->find('list', array('order' => 'nome ASC'));
        $periodos = $this->ListaCompra->Periodo->find('list', array('order' => 'id DESC'));
        $modos = $model->getModeList();
        $this->set(compact('associados', 'periodos', 'modos','referencia'));
    }

    public function listaConvenio($periodo, $convenio, $modo,
                                  $todos, $referencia)
    {
        if (($modo == 1) && !$todos) {
            $options = array('conditions' => array(
                'Compra.periodo_id' => $periodo,
                'Compra.convenio_id' => $convenio));
        } else {
            $options = array('conditions' => array(
                'Compra.periodo_id' => $periodo),
                'order' => array('Compra.convenio_id'));
        }
        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'periodo', 'convenio',
            'total', 'modo', 'todos', 'referencia'));
    }

    public function formConvenio($id = null)
    {
        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
            $date = $this->ListaCompra->Periodo->find('all', $date_conditions);

            $referencia = $date[0]['Periodo']['referencia'];

            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaConvenio',
                $data['ListaCompra']['periodo_id'],
                $data['ListaCompra']['convenio_id'],
                $data['ListaCompra']['modo_id'],
                $data['ListaCompra']['todos'],
                $referencia));
        }
        $convenios = $this->ListaCompra->Convenio->find('list', array('order' => 'razaoSocial ASC'));
        $periodos = $this->ListaCompra->Periodo->find('list', array('order' => 'id DESC'));
        $modos = $model->getModeList();
        $this->set(compact('convenios', 'periodos', 'modos'));
    }

    public function listaDevedores($periodo)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.associado_id'));

        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;
        $this->set(compact('compras', 'periodo', 'total'));
    }

    public function formDevedores()
    {
        $model = ClassRegistry::init('ListaCompra');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->redirect(array('controller' => 'ListaCompra', 'action' => 'listaDevedores', $data['ListaCompra']['periodo_id']));
        }
        $periodos = $this->ListaCompra->Periodo->find('list');
        $this->set(compact('periodos'));
    }

    public function viewpdf_compras_todas_analiticas($periodo, $associado, $referencia)
    {

        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.associado_id'));

        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('compras', 'data_inicio', 'data_fim', 'associado',
            'total', 'referencia'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_compras_todas_analiticas');
    }

    public function viewpdf_compras_analiticas($periodo, $associado, $referencia)
    {
        $total = 0;
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo,
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
        $this->set(compact('compras', 'total', 'referencia'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_compras_analiticas');
    }

    public function viewpdf_compras_sinteticas($periodo, $associado, $referencia)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.associado_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('compras', 'referencia'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_compras_sinteticas');
    }

    public function viewpdf_convenios_analiticos($periodo, $convenio, $referencia)
    {
        $total = 0;
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo,
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
        $this->set(compact('compras', 'total', 'referencia'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_convenios_analiticos');
    }

    public function viewpdf_convenios_sinteticos($periodo, $convenio, $referencia)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id ' => $periodo),
            'order' => array('Compra.convenio_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        //Import /app/Vendor/Fpdf
        App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
        //Assign layout to /app/View/Layout/pdf.ctp
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        //Set fpdf variable to use in view
        $this->set('pdf', new FPDF("P", "mm", "A4"));
        //pass data to view
        $this->set(compact('compras', 'referencia'));
        //render the pdf view (app/View/[view_name]/pdf.ctp)
        $this->render('pdf_convenios_sinteticos');
    }

    public function export_compras_todas_analiticas($periodo, $associado)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.associado_id'));

        $compras = $this->ListaCompra->Compra->find('all', $options);
        $total = 0;

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'periodo', 'associado', 'total'));
    }

    public function export_compras_analiticas($periodo, $associado)
    {
        $total = 0;
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo,
            'Compra.associado_id' => $associado));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'total'));
    }

    public function export_compras_sinteticas($periodo, $associado, $valorTotal)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.associado_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'valorTotal'));
    }

    public function export_convenios_analiticos($periodo, $convenio)
    {
        $total = 0;
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo,
            'Compra.convenio_id' => $convenio));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        foreach ($compras as $compra):
            $total += (float)$compra['Compra']['valor'];
        endforeach;

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'total'));
    }

    public function export_convenios_sinteticos($periodo, $convenio, $valorTotal)
    {
        $options = array('conditions' => array(
            'Compra.periodo_id' => $periodo),
            'order' => array('Compra.convenio_id'));
        $compras = $this->ListaCompra->Compra->find('all', $options);

        //$data = $this->Model->find('all');
        $this->set(compact('compras', 'valorTotal'));
    }
}
