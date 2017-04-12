<?php
App::uses('AppController', 'Controller');

/**
 * Emprestimos Controller
 *
 * @property Emprestimo $Emprestimo
 * @property PaginatorComponent $Paginator
 */
class EmprestimosController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public $paginate = array(
        'order' => array(
            'Emprestimo.titulo' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Emprestimo->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('emprestimos', $this->Paginator->paginate());
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
        if (!$this->Emprestimo->exists($id)) {
            throw new NotFoundException(__('Empréstimo inválido.'));
        }
        $options = array('conditions' => array('Emprestimo.' . $this->Emprestimo->primaryKey => $id));
        $this->set('emprestimo', $this->Emprestimo->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Emprestimo->create();
            if ($this->Emprestimo->save($this->request->data)) {
                $this->Session->setFlash(__('Registro inserido com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível inserir o registro. Favor, tente novamente.'));
            }
        }
        $associados = $this->Emprestimo->Associado->find('list', array('order' => 'nome ASC'));
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
        if (!$this->Emprestimo->exists($id)) {
            throw new NotFoundException(__('Empréstimo inválido.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Emprestimo->save($this->request->data)) {
                $this->Session->setFlash(__('Alteração realizada com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível realizar a alteração. Favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Emprestimo.' . $this->Emprestimo->primaryKey => $id));
            $this->request->data = $this->Emprestimo->find('first', $options);
        }
        $associados = $this->Emprestimo->Associado->find('list', array('order' => 'nome ASC'));
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
        $this->Emprestimo->id = $id;
        if (!$this->Emprestimo->exists()) {
            throw new NotFoundException(__('Empréstimo inválido.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Emprestimo->delete()) {
            $this->Session->setFlash(__('Registro removido com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o registro. Favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
