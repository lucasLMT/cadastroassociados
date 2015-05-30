<?php
App::uses('AppController', 'Controller');
/**
 * Periodos Controller
 *
 * @property Periodo $Periodo
 * @property PaginatorComponent $Paginator
 */
class PeriodosController extends AppController {

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
		$this->Periodo->recursive = 0;
		$this->set('periodos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Periodo->exists($id)) {
			throw new NotFoundException(__('Invalid periodo'));
		}
		$options = array('conditions' => array('Periodo.' . $this->Periodo->primaryKey => $id));
		$this->set('periodo', $this->Periodo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Periodo->create();
			if ($this->Periodo->save($this->request->data)) {
				$this->Session->setFlash(__('The periodo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The periodo could not be saved. Please, try again.'));
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
		if (!$this->Periodo->exists($id)) {
			throw new NotFoundException(__('Invalid periodo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Periodo->save($this->request->data)) {
				$this->Session->setFlash(__('The periodo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The periodo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Periodo.' . $this->Periodo->primaryKey => $id));
			$this->request->data = $this->Periodo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Periodo->id = $id;
		if (!$this->Periodo->exists()) {
			throw new NotFoundException(__('Invalid periodo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Periodo->delete()) {
			$this->Session->setFlash(__('The periodo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The periodo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
