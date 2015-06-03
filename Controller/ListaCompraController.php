<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 */
class ListaCompraController extends AppController {

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
	public function listaAssociado($data_inicio, $data_fim, $associado, $modo) {

		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
											   'Compra.referencia <= ' => $data_fim,
											   'Compra.associado_id' => $associado));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		$total = 0;
		$this->set(compact('compras','data_inicio','data_fim','associado','total','modo'));

	}

	public function listaConvenio($data_inicio, $data_fim, $convenio, $modo) {

		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
											   'Compra.referencia <= ' => $data_fim,
											   'Compra.convenio_id' => $convenio));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		$total = 0;
		$this->set(compact('compras','data_inicio','data_fim','convenio','total','modo'));

	}

	public function formAssociado($id = null) {

		$model = ClassRegistry::init('ListaCompra');

		if ($this->request->is('post')) {
			$data = $this->request->data;
			$date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
			$date = $this->ListaCompra->Periodo->find('all', $date_conditions);

			$data_inicio = $date[0]['Periodo']['data_inicial'];
			$data_fim = $date[0]['Periodo']['data_final'];

			$this->redirect(array('controller' => 'ListaCompra','action' => 'listaAssociado', $data_inicio, $data_fim,
																			$data['ListaCompra']['associado_id'],
																			$data['ListaCompra']['modo_id']));
		}
		$associados = $this->ListaCompra->Associado->find('list');
		$periodos = $this->ListaCompra->Periodo->find('list');
		$modos = $model->getModeList();
		$this->set(compact('associados', 'periodos', 'modos'));
	}

	public function formConvenio($id = null) {

		$model = ClassRegistry::init('ListaCompra');

		if ($this->request->is('post')) {

			$data = $this->request->data;
			$date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
			$date = $this->ListaCompra->Periodo->find('all', $date_conditions);

			$data_inicio = $date[0]['Periodo']['data_inicial'];
			$data_fim = $date[0]['Periodo']['data_final'];

			$this->redirect(array('controller' => 'ListaCompra','action' => 'listaConvenio', $data_inicio, $data_fim,
																					$data['ListaCompra']['convenio_id'],
																					$data['ListaCompra']['modo_id']));

		}
		$convenios = $this->ListaCompra->Convenio->find('list');
		$periodos = $this->ListaCompra->Periodo->find('list');
		$modos = $model->getModeList();
		$this->set(compact('convenios', 'periodos', 'modos'));
	}

	public function viewpdf($data_inicio, $data_fim, $associado) {
		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
																	'Compra.referencia <= ' => $data_fim,
																	'Compra.associado_id' => $associado));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		//Import /app/Vendor/Fpdf
    App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
    //Assign layout to /app/View/Layout/pdf.ctp
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    //Set fpdf variable to use in view
    $this->set('fpdf', new FPDF('P','mm','A4'));
    //pass data to view
	  $this->set(compact('compras'));
    //render the pdf view (app/View/[view_name]/pdf.ctp)
    $this->render('pdf');
  }

	public function export($data_inicio, $data_fim, $associado) {
		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
																	'Compra.referencia <= ' => $data_fim,
																	'Compra.associado_id' => $associado));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		//$data = $this->Model->find('all');
    $this->set(compact('compras'));
  }
}
