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

    public $paginate = array(
        'order' => array(
            'Compra.referencia' => 'DESC'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Compra->recursive = 0;
        $this->Paginator->settings = $this->paginate;
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
            $data = $this->request->data;

            $referencia = $data['Compra']['referencia'];
            $data['Compra']['referencia'] = revertDate($referencia);

            if ($this->Compra->save($data)) {
                $this->Session->setFlash(__('Compra adicionada.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível adicionar a compra. Por favor, tente novamente.'));
            }
        }
        $convenios = $this->Compra->Convenio->find('list', array('order' => 'razaoSocial ASC'));
        $associados = $this->Compra->Associado->find('list', array('order' => 'nome ASC'));
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

            $data = $this->request->data;

            $referencia = $data['Compra']['referencia'];
            $data['Compra']['referencia'] = revertDate($referencia);

            if ($this->Compra->save($data)) {
                $this->Session->setFlash(__('Compra salva.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a compra. Por favor, Tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
            $comprasTmp = $this->Compra->find('first', $options);

            $referencia = $comprasTmp['Compra']['referencia'];
            $comprasTmp['Compra']['referencia'] = revertDate($referencia);

            $this->request->data = $comprasTmp;

        }
        $convenios = $this->Compra->Convenio->find('list', array('order' => 'razaoSocial ASC'));
        $associados = $this->Compra->Associado->find('list', array('order' => 'nome ASC'));
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
            $this->Session->setFlash(__('Compra removida.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover a compra. Por favor, Tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
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
