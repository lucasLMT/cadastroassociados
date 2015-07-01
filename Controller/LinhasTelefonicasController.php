<?php
App::uses('AppController', 'Controller');
/**
 * LinhasTelefonicas Controller
 *
 * @property LinhasTelefonica $LinhasTelefonica
 * @property PaginatorComponent $Paginator
 */
class LinhasTelefonicasController extends AppController {

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
	public function index() {
		$this->LinhasTelefonica->recursive = 0;
		$this->set('linhasTelefonicas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LinhasTelefonica->exists($id)) {
			throw new NotFoundException(__('Invalid linhas telefonica'));
		}
		$options = array('conditions' => array('LinhasTelefonica.' . $this->LinhasTelefonica->primaryKey => $id));
		$this->set('linhasTelefonica', $this->LinhasTelefonica->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LinhasTelefonica->create();
			if ($this->LinhasTelefonica->save($this->request->data)) {
				$this->Session->setFlash(__('The linhas telefonica has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linhas telefonica could not be saved. Please, try again.'));
			}
		}
		$associados = $this->LinhasTelefonica->Associado->find('list');
		$this->set(compact('associados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LinhasTelefonica->exists($id)) {
			throw new NotFoundException(__('Invalid linhas telefonica'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LinhasTelefonica->save($this->request->data)) {
				$this->Session->setFlash(__('The linhas telefonica has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The linhas telefonica could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LinhasTelefonica.' . $this->LinhasTelefonica->primaryKey => $id));
			$this->request->data = $this->LinhasTelefonica->find('first', $options);
		}
		$associados = $this->LinhasTelefonica->Associado->find('list');
		$this->set(compact('associados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LinhasTelefonica->id = $id;
		if (!$this->LinhasTelefonica->exists()) {
			throw new NotFoundException(__('Invalid linhas telefonica'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LinhasTelefonica->delete()) {
			$this->Session->setFlash(__('The linhas telefonica has been deleted.'));
		} else {
			$this->Session->setFlash(__('The linhas telefonica could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function listaLinhas($associado_id, $modo, $numero = null) {
		if ($modo == 1) {
			$options = array('conditions'=>array('associado_id' => $associado_id));	
		} else {
			$options = array('conditions'=>array('numero' => $numero));	
		}
		$linhasTelefonicas = $this->LinhasTelefonica->find('all', $options);
		$this->set(compact('linhasTelefonicas'));
	}

	public function formLinhas($id = null) {

		$model = ClassRegistry::init('LinhasTelefonica');

		if ($this->request->is('post')) {
			$data = $this->request->data;
			if ($data['LinhasTelefonica']['modo_id'] == 1) {
				$options = array('conditions'=>array('associado_id'=>$data['LinhasTelefonica']['associado_id']));
				$associado = $this->LinhasTelefonica->Associado->find('all', $options);
			}
			$this->redirect(array('controller' => 'LinhasTelefonicas','action' => 'listaLinhas', 
																			$data['LinhasTelefonica']['associado_id'],
																			$data['LinhasTelefonica']['modo_id'],
																			$data['LinhasTelefonica']['numero']));
		}
		$associados = $this->LinhasTelefonica->Associado->find('list');
		$modos = $model->getModeList();
		$this->set(compact('associados', 'modos'));
	}
}
