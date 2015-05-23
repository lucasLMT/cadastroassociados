<?php
App::uses('AppController', 'Controller');
/**
 * Convenios Controller
 *
 * @property Convenio $Convenio
 * @property PaginatorComponent $Paginator
 */
class ConveniosController extends AppController {

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
		$this->Convenio->recursive = 0;
		$this->set('convenios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Convenio->exists($id)) {
			throw new NotFoundException(__('Invalid convenio'));
		}
		$options = array('conditions' => array('Convenio.' . $this->Convenio->primaryKey => $id));
		$this->set('convenio', $this->Convenio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Convenio->create();
			if ($this->Convenio->save($this->request->data)) {
				$this->Session->setFlash(__('The convenio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The convenio could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Convenio->exists($id)) {
			throw new NotFoundException(__('Invalid convenio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Convenio->save($this->request->data)) {
				$this->Session->setFlash(__('The convenio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The convenio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Convenio.' . $this->Convenio->primaryKey => $id));
			$this->request->data = $this->Convenio->find('first', $options);
		}
		$grupos = $this->Convenio->Grupo->find('list');
		$this->set(compact('grupos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Convenio->id = $id;
		if (!$this->Convenio->exists()) {
			throw new NotFoundException(__('Invalid convenio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Convenio->delete()) {
			$this->Session->setFlash(__('The convenio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The convenio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
