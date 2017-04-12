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
            throw new NotFoundException(__('Operadora inválida.'));
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
                $this->Session->setFlash(__('Registro inserido com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível inserir o registro. Favor, tente novamente.'));
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
            throw new NotFoundException(__('Operadora inválida.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Operadora->save($this->request->data)) {
                $this->Session->setFlash(__('Alteração realizada com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível realizar a alteração. Favor, tente novamente.'));
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
            throw new NotFoundException(__('Operadora inválida.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Operadora->delete()) {
            $this->Session->setFlash(__('Registro removido com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o registro. Favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
