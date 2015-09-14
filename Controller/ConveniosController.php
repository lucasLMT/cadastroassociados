<?php
App::uses('AppController', 'Controller');

/**
 * Convenios Controller
 *
 * @property Convenio $Convenio
 * @property PaginatorComponent $Paginator
 */
class ConveniosController extends AppController
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
    public function view($id = null)
    {
        if (!$this->Convenio->exists($id)) {
            throw new NotFoundException(__('Convênio inválido.'));
        }
        $options = array('conditions' => array('Convenio.' . $this->Convenio->primaryKey => $id));
        $this->set('convenio', $this->Convenio->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $model = ClassRegistry::init('Convenio');

        if ($this->request->is('post')) {
            $this->Convenio->create();
            if ($this->Convenio->save($this->request->data)) {
                $this->Session->setFlash(__('Convênio adicionado.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível adicionar o convênio. Por favor, Tente novamente.'));
            }
        }
        $status = $model->getStatus();
        $this->set(compact('status'));
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
        if (!$this->Convenio->exists($id)) {
            throw new NotFoundException(__('Convênio inválido.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Convenio->save($this->request->data)) {
                $this->Session->setFlash(__('Convênio salvo.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o convênio. Por favor, Tente novamente.'));
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
    public function delete($id = null)
    {
        $this->Convenio->id = $id;
        if (!$this->Convenio->exists()) {
            throw new NotFoundException(__('Convênio inválido.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Convenio->delete()) {
            $this->Session->setFlash(__('Convênio removido.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o convênio. Por favor, Tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
