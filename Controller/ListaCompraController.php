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
	public function lista($data_inicio, $data_fim, $associado) {

		$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
								                   'Compra.referencia <= ' => $data_fim,
								                   'Compra.associado_id' => $associado));
		$compras = $this->ListaCompra->Compra->find('all', $options);
		$this->set(compact('compras'));
	}

	public function form($id = null) {

		$model = ClassRegistry::init('ListaCompra');

		if ($this->request->is('post')) {
			App::uses('String', 'Utility');
			$data = $this->request->data;
			$data_inicio = String::insert(':ano-:mes-:dia', array(
											'ano' => $data['ListaCompra']['data_inicio']['year'],
											'mes' => $data['ListaCompra']['data_inicio']['month'],
											'dia' => $data['ListaCompra']['data_inicio']['day']));
			$data_fim = String::insert(':ano-:mes-:dia', array(
											'ano' => $data['ListaCompra']['data_fim']['year'],
											'mes' => $data['ListaCompra']['data_fim']['month'],
											'dia' => $data['ListaCompra']['data_fim']['day']));

			$options = array('conditions' => array('Compra.referencia >= ' => $data_inicio,
								                   'Compra.referencia <= ' => $data_fim));
			$compras = $this->ListaCompra->Compra->find('all', $options);
			//debug($compras);
			$this->redirect(array('controller' => 'ListaCompra','action' => 'lista', $data_inicio, $data_fim, 
																					 $data['ListaCompra']['associado_id']));
		}
		$associados = $this->ListaCompra->Associado->find('list');
		$this->set(compact('associados'));
	}
}
