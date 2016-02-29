<?php
App::uses('AppController', 'Controller');

/**
 * Refeitorios Controller
 *
 * @property Refeitorio $Refeitorio
 * @property PaginatorComponent $Paginator
 */
class RefeitoriosController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public $paginate = array(
        'order' => array(
            'Refeitorio.data' => 'DESC'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Refeitorio->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('refeitorios', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Refeitorio->exists($id)) {
            throw new NotFoundException(__('Invalid refeitorio'));
        }
        $options = array('conditions' => array('Refeitorio.' . $this->Refeitorio->primaryKey => $id));
        $this->set('refeitorio', $this->Refeitorio->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Refeitorio->create();
            if ($this->Refeitorio->save($this->request->data)) {
                $this->Session->setFlash(__('The refeitorio has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The refeitorio could not be saved. Please, try again.'));
            }
        }
        $associados = $this->Refeitorio->Associado->find('list', array('order' => 'nome ASC'));
        $this->set(compact('associados'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Refeitorio->exists($id)) {
            throw new NotFoundException(__('Invalid refeitorio'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Refeitorio->save($this->request->data)) {
                $this->Session->setFlash(__('The refeitorio has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The refeitorio could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Refeitorio.' . $this->Refeitorio->primaryKey => $id));
            $this->request->data = $this->Refeitorio->find('first', $options);
        }
        $associados = $this->Refeitorio->Associado->find('list', array('order' => 'nome ASC'));
        $this->set(compact('associados'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Refeitorio->id = $id;
        if (!$this->Refeitorio->exists()) {
            throw new NotFoundException(__('Invalid refeitorio'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Refeitorio->delete()) {
            $this->Session->setFlash(__('The refeitorio has been deleted.'));
        } else {
            $this->Session->setFlash(__('The refeitorio could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
