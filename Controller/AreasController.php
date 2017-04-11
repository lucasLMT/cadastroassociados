<?php
App::uses('AppController', 'Controller');

/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 */
class AreasController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'CsvView.CsvView');

    public $paginate = array(
        'order' => array(
            'Area.nome' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Area->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('areas', $this->Paginator->paginate());
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
        if (!$this->Area->exists($id)) {
            throw new NotFoundException(__('Área inválida'));
        }
        $options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
        $this->set('area', $this->Area->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Area->create();
            if ($this->Area->save($this->request->data)) {
                $this->Session->setFlash(__('A área foi salva com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A nova área não pode ser salva, tente novamente.'));
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
        if (!$this->Area->exists($id)) {
            throw new NotFoundException(__('Invalid area'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Area->save($this->request->data)) {
                $this->Session->setFlash(__('Alteração realizada com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível realizar a alteração. Favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
            $this->request->data = $this->Area->find('first', $options);
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
        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            throw new NotFoundException(__('Invalid area'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Area->delete()) {
            $this->Session->setFlash(__('A área foi deletada com sucesso.'));
        } else {
            $this->Session->setFlash(__('A área não pode ser deletada, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function search()
    {
        //$this->isAdmin();
        $area = $this->request->data;
        if (!empty($area)) {
            $result = $this->Area->find('all', array('conditions' => array('Area.nome LIKE' => "%" . $area['Area']['Busca'] . "%")));
            $this->set(compact('result'));
        } else {
            $this->redirect(array('controller' => 'area', 'action' => 'index'));
        }
    }

}
