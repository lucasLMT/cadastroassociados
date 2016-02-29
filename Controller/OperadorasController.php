<?php
App::uses('AppController', 'Controller');

/**
 * Operadoras Controller
 *
 * @property Operadora $Operadora
 * @property PaginatorComponent $Paginator
 */
class OperadorasController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public $paginate = array(
        'order' => array(
            'Operadora.nome' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Operadora->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('operadoras', $this->Paginator->paginate());
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
        if (!$this->Operadora->exists($id)) {
            throw new NotFoundException(__('Invalid operadora'));
        }
        $options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
        $this->set('operadora', $this->Operadora->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Operadora->create();
            if ($this->Operadora->save($this->request->data)) {
                $this->Session->setFlash(__('The operadora has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The operadora could not be saved. Please, try again.'));
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
    public function edit($id = null)
    {
        if (!$this->Operadora->exists($id)) {
            throw new NotFoundException(__('Invalid operadora'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Operadora->save($this->request->data)) {
                $this->Session->setFlash(__('The operadora has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The operadora could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
            $this->request->data = $this->Operadora->find('first', $options);
        }
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
        $this->Operadora->id = $id;
        if (!$this->Operadora->exists()) {
            throw new NotFoundException(__('Invalid operadora'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Operadora->delete()) {
            $this->Session->setFlash(__('The operadora has been deleted.'));
        } else {
            $this->Session->setFlash(__('The operadora could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
