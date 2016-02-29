<?php
App::uses('AppController', 'Controller');

/**
 * LinhasTelefonicas Controller
 *
 * @property LinhasTelefonica $LinhasTelefonica
 * @property PaginatorComponent $Paginator
 */
class LinhasTelefonicasController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public $paginate = array(
        'order' => array(
            'LinhasTelefonica.associado_id' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->LinhasTelefonica->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('linhasTelefonicas', $this->Paginator->paginate());
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
        if (!$this->LinhasTelefonica->exists($id)) {
            throw new NotFoundException(__('Invalid linhas telefonica'));
        }
        $options = array('conditions' => array('LinhasTelefonica.' . $this->LinhasTelefonica->primaryKey => $id));
        $this->set('linhasTelefonica', $this->LinhasTelefonica->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->LinhasTelefonica->create();
            $data = $this->request->data;

            $date = $data['LinhasTelefonica']['data'];
            $data['LinhasTelefonica']['data'] = revertDate($date);
            $devolucao = $data['LinhasTelefonica']['devolucao'];
            $data['LinhasTelefonica']['devolucao'] = revertDate($devolucao);

            if ($this->LinhasTelefonica->save($data)) {
                $this->Session->setFlash(__('The linhas telefonica has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The linhas telefonica could not be saved. Please, try again.'));
            }
        }
        $associados = $this->LinhasTelefonica->Associado->find('list', array('order' => 'nome ASC'));
        $operadoras = $this->LinhasTelefonica->Operadora->find('list', array('order' => 'nome ASC'));
        $this->set(compact('associados', 'operadoras'));
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
        if (!$this->LinhasTelefonica->exists($id)) {
            throw new NotFoundException(__('Invalid linhas telefonica'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;

            $date = $data['LinhasTelefonica']['data'];
            $data['LinhasTelefonica']['data'] = revertDate($date);
            $devolucao = $data['LinhasTelefonica']['devolucao'];
            $data['LinhasTelefonica']['devolucao'] = revertDate($devolucao);

            if ($this->LinhasTelefonica->save($data)) {
                $this->Session->setFlash(__('The linhas telefonica has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The linhas telefonica could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('LinhasTelefonica.' . $this->LinhasTelefonica->primaryKey => $id));
            $linhasTmp = $this->LinhasTelefonica->find('first', $options);

            $date = $linhasTmp['LinhasTelefonica']['data'];
            $linhasTmp['LinhasTelefonica']['data'] = revertDate($date);
            $devolucao = $linhasTmp['LinhasTelefonica']['devolucao'];
            $linhasTmp['LinhasTelefonica']['devolucao'] = revertDate($devolucao);

            $this->request->data = $linhasTmp;
        }
        $associados = $this->LinhasTelefonica->Associado->find('list', array('order' => 'nome ASC'));
        $operadoras = $this->LinhasTelefonica->Operadora->find('list', array('order' => 'nome ASC'));
        $this->set(compact('associados', 'operadoras'));
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
        $this->LinhasTelefonica->id = $id;
        if (!$this->LinhasTelefonica->exists()) {
            throw new NotFoundException(__('Invalid linhas telefonica'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->LinhasTelefonica->delete()) {
            $this->Session->setFlash(__('The linhas telefonica has been deleted.'));
        } else {
            $this->Session->setFlash(__('The linhas telefonica could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listaLinhas($associado_id, $modo, $numero = null)
    {
        if ($modo == 1) {
            $options = array('conditions' => array('associado_id' => $associado_id));
        } else {
            $options = array('conditions' => array('numero' => $numero));
        }
        $linhasTelefonicas = $this->LinhasTelefonica->find('all', $options);
        $this->set(compact('linhasTelefonicas'));
    }

    public function formLinhas($id = null)
    {

        $model = ClassRegistry::init('LinhasTelefonica');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['LinhasTelefonica']['modo_id'] == 1) {
                $options = array('conditions' => array('associado_id' => $data['LinhasTelefonica']['associado_id']));
                $associado = $this->LinhasTelefonica->Associado->find('all', $options);
            }
            $this->redirect(array('controller' => 'LinhasTelefonicas', 'action' => 'listaLinhas',
                $data['LinhasTelefonica']['associado_id'],
                $data['LinhasTelefonica']['modo_id'],
                $data['LinhasTelefonica']['numero']));
        }
        $associados = $this->LinhasTelefonica->Associado->find('list', array('order' => 'nome ASC'));
        $modos = $model->getModeList();
        $this->set(compact('associados', 'modos'));
    }
}

function revertDate($date)
{
    if ($date != '') {
        $dates = explode('-', $date);
        $datesTmp[0] = $dates[2];
        $datesTmp[1] = $dates[1];
        $datesTmp[2] = $dates[0];
        return join('-', $datesTmp);
    }
    return $date;
}
