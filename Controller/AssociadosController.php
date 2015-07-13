<?php
App::uses('AppController', 'Controller');

/**
 * Associados Controller
 *
 * @property Associado $Associado
 * @property PaginatorComponent $Paginator
 */
class AssociadosController extends AppController
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
        $this->Associado->recursive = 0;
        $this->set('associados', $this->Paginator->paginate());
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
        if (!$this->Associado->exists($id)) {
            throw new NotFoundException(__('Invalid associado'));
        }
        $options = array('conditions' => array('Associado.' . $this->Associado->primaryKey => $id));
        $this->set('associado', $this->Associado->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Associado->create();
            if ($this->Associado->save($this->request->data)) {
                $this->Session->setFlash(__('The associado has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The associado could not be saved. Please, try again.'));
            }
        }
        $cargos = $this->Associado->Cargo->find('list');
        $areas = $this->Associado->Area->find('list');
        $this->set(compact('cargos', 'areas'));
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
        if (!$this->Associado->exists($id)) {
            throw new NotFoundException(__('Invalid associado'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Associado->save($this->request->data)) {
                $this->Session->setFlash(__('The associado has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The associado could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Associado.' . $this->Associado->primaryKey => $id));
            $this->request->data = $this->Associado->find('first', $options);
        }
        $cargos = $this->Associado->Cargo->find('list');
        $areas = $this->Associado->Area->find('list');
        $this->set(compact('cargos', 'areas'));
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
        $this->Associado->id = $id;
        if (!$this->Associado->exists()) {
            throw new NotFoundException(__('Invalid associado'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Associado->delete()) {
            $this->Session->setFlash(__('The associado has been deleted.'));
        } else {
            $this->Session->setFlash(__('The associado could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listaAniversario($id = null)
    {

        $data = date("m-d");
        debug($data);
        $options = array('conditions' => array("strftime('%m-%d',Associado.dataDeNascimento)" => $data));
        $aniversariantes = $this->Associado->find('all', $options);
        debug($aniversariantes);
        $this->set(compact('aniversariantes'));
    }


}
