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

/**
 * index method
 *
 * @return void
 */
	public function lista($data_inicio, $data_fim, $associado) {

		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
																	'Compra.referencia <= ' => $data_fim,
																	'Compra.associado_id' => $associado));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		$this->set(compact('compras','data_inicio','data_fim','associado'));
		//$this->redirect(array('controller' => 'ListaCompra','action' => 'viewpdf'));
		//$this->render('pdf');
		//$this->set('fpdf',new FPDF('P','mm','A4'));

	}

	public function form($id = null) {

		$model = ClassRegistry::init('ListaCompra');

		if ($this->request->is('post')) {
			//App::uses('String', 'Utility');
			$data = $this->request->data;
			$date_conditions = array('conditions' => array('Periodo.id' => $data['ListaCompra']['periodo_id']));
			$date = $this->ListaCompra->Periodo->find('all', $date_conditions);
			//debug($date);
			/*$data_inicio = String::insert(':ano-:mes-:dia', array(
											'ano' => $date[0]['data_inicial']['year'],
											'mes' => $date[0]['data_inicial']['month'],
											'dia' => $date[0]['data_inicial']['day']));*/
			$data_inicio = $date[0]['Periodo']['data_inicial'];
			/*$data_fim = String::insert(':ano-:mes-:dia', array(
											'ano' => $date['Periodo']['data_final']['year'],
											'mes' => $date['Periodo']['data_final']['month'],
											'dia' => $date['Periodo']['data_final']['day']));*/
			$data_fim = $date[0]['Periodo']['data_final'];

			$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
								                   'Compra.referencia <= ' => $data_fim));
			$compras = $this->ListaCompra->Compra->find('all', $options);
			//debug($compras);
			$this->redirect(array('controller' => 'ListaCompra','action' => 'lista', $data_inicio, $data_fim,
																					 $data['ListaCompra']['associado_id']));
		}
		$associados = $this->ListaCompra->Associado->find('list');
		$periodos = $this->ListaCompra->Periodo->find('list');
		$this->set(compact('associados', 'periodos'));
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
}
