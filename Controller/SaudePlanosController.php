<?php
App::uses('AppController', 'Controller');

/**
 * SaudePlanos Controller
 *
 * @property SaudePlano $SaudePlano
 * @property PaginatorComponent $Paginator
 */
class SaudePlanosController extends AppController
{

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
    public function index()
    {
        $this->SaudePlano->recursive = 0;
        $this->set('saudePlanos', $this->Paginator->paginate());
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
        if (!$this->SaudePlano->exists($id)) {
            throw new NotFoundException(__('Invalid saude plano'));
        }
        $options = array('conditions' => array('SaudePlano.' . $this->SaudePlano->primaryKey => $id));
        $this->set('saudePlano', $this->SaudePlano->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->SaudePlano->create();
            if ($this->SaudePlano->save($this->request->data)) {
                $this->Session->setFlash(__('The saude plano has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The saude plano could not be saved. Please, try again.'));
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
        if (!$this->SaudePlano->exists($id)) {
            throw new NotFoundException(__('Invalid saude plano'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SaudePlano->save($this->request->data)) {
                $this->Session->setFlash(__('The saude plano has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The saude plano could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SaudePlano.' . $this->SaudePlano->primaryKey => $id));
            $this->request->data = $this->SaudePlano->find('first', $options);
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
        $this->SaudePlano->id = $id;
        if (!$this->SaudePlano->exists()) {
            throw new NotFoundException(__('Invalid saude plano'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SaudePlano->delete()) {
            $this->Session->setFlash(__('The saude plano has been deleted.'));
        } else {
            $this->Session->setFlash(__('The saude plano could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
