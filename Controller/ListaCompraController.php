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
	public function lista() {
		$this->ListaCompra->recursive = 0;
		$this->set('listaCompras', $this->Paginator->paginate());
	}

	public function form($id = null) {

		//$this->loadModel('ListaCompra');
		$model = ClassRegistry::init('ListaCompra');

		if (!$this->request->is(array('post', 'put'))) {
			
		}
		//$options = array('conditions' => array('Compra.associado_id' => $id));
		$associados = $this->ListaCompra->Associado->find('list');//$model->getAssociadosList();
		$this->set(compact('associados'));
	}
}
