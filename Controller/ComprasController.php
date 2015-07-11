<?php
App::uses('AppController', 'Controller');

/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 */
class ComprasController extends AppController
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
        $this->Compra->recursive = 0;
        $this->set('compras', $this->Paginator->paginate());
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
        if (!$this->Compra->exists($id)) {
            throw new NotFoundException(__('Compra inválida.'));
        }
        $options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
        $this->set('compra', $this->Compra->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Compra->create();
            if ($this->Compra->save($this->request->data)) {
                $this->Session->setFlash(__('Compra salva.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a compra. Por favor, Tente novamente.'));
            }
        }
        $convenios = $this->Compra->Convenio->find('list');
        $associados = $this->Compra->Associado->find('list');
        $this->set(compact('convenios', 'associados'));
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
        if (!$this->Compra->exists($id)) {
            throw new NotFoundException(__('Compra inválida.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Compra->save($this->request->data)) {
                $this->Session->setFlash(__('Compra salva.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a compra. Por favor, Tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
            $this->request->data = $this->Compra->find('first', $options);
        }
        $convenios = $this->Compra->Convenio->find('list');
        $associados = $this->Compra->Associado->find('list');
        $this->set(compact('convenios', 'associados'));
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
        $this->Compra->id = $id;
        if (!$this->Compra->exists()) {
            throw new NotFoundException(__('Compra inválida.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Compra->delete()) {
            $this->Session->setFlash(__('The compra has been deleted.'));
        } else {
            $this->Session->setFlash(__('The compra could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
