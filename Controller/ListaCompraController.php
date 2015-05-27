<?php
App::uses('AppController', 'Controller');

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
	public function lista($compras = null) {
		$this->ListaCompra->recursive = 0;
		$ListaCompras = $this->Paginator->paginate();
		$this->set(compact('ListaCompras', 'compras'));
	}

	public function form($id = null) {

		//$this->loadModel('ListaCompra');
		$model = ClassRegistry::init('ListaCompra');

		if ($this->request->is('post')) {
			App::uses('String', 'Utility');
			$data = $this->request->data;
			$data_inicio = String::insert(':ano/:mes/:dia', array(
											'ano' => $data['ListaCompra']['data_inicio']['year'],
											'mes' => $data['ListaCompra']['data_inicio']['month'],
											'dia' => $data['ListaCompra']['data_inicio']['day']));
			$data_fim = String::insert(':ano/:mes/:dia', array(
											'ano' => $data['ListaCompra']['data_fim']['year'],
											'mes' => $data['ListaCompra']['data_fim']['month'],
											'dia' => $data['ListaCompra']['data_fim']['day']));

			$options = array('conditions' => array(//'Compra.referencia' => '2015-05-24'));//$data_inicio)); 
												   'Compra.referencia between ? and ?'=> array(
												   	$data_inicio, $data_fim)));
			$compras = $this->ListaCompra->Compra->find('all', $options);
			debug($compras);
			$this->redirect(array('action' => 'form'));
		}
		//$options = array('conditions' => array('Compra.associado_id' => $id));
		$associados = $this->ListaCompra->Associado->find('list');//$model->getAssociadosList();
		$this->set(compact('associados'));
	}
}
