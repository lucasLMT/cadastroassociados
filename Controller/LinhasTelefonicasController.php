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
        $model = ClassRegistry::init('LinhasTelefonica');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            try {
                $associado_id = $data['LinhasTelefonica']['associado_id'] ? $data['LinhasTelefonica']['associado_id'] : null;
                $numero = $data['LinhasTelefonica']['numero'] ? $data['LinhasTelefonica']['numero'] : null;
                $modo = $data['LinhasTelefonica']['modo_id'];
                if ($modo == 1 && $associado_id) {                    
                    $options = array('conditions' => array('associado_id' => $associado_id));
                    $associado = $this->LinhasTelefonica->Associado->find('all', $options);
                    $this->redirect(array('controller' => 'LinhasTelefonicas', 'action' => 'listaLinhas',                
                        $associado_id,
                        $modo));
                } else if ($modo == 2 && $numero) {                    
                    $options = array('conditions' => array('numero' => $data['LinhasTelefonica']['numero']));            
                    $associado = $this->LinhasTelefonica->find('all', $options);                    
                    $this->redirect(array('controller' => 'LinhasTelefonicas', 'action' => 'listaLinhas',                
                        $numero,
                        $modo));                                
                } else {
                    throw new Exception(__('Selecione o modo de busca correto ou verifique se os campos estão preenchidos corretamente.'));
                }    
            } catch (Exception $e) {
                echo 'Erro na busca: ',  $e->getMessage(), "\n";                                                
            }    
        }
        $associados = $this->LinhasTelefonica->Associado->find('list', array('order' => 'nome ASC'));
        $modos = $model->getModeList();
        $this->set(compact('associados', 'modos'));
                    
        //$this->LinhasTelefonica->recursive = 0;
        //$this->Paginator->settings = $this->paginate;        
        //$this->set('linhasTelefonicas', $this->Paginator->paginate());
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
            throw new NotFoundException(__('Linha Telefônica inválida.'));
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
                $this->Session->setFlash(__('Registro inserido com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível inserir o registro. Favor, tente novamente.'));
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
            throw new NotFoundException(__('Linha Telefônica inválida.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;

            $date = $data['LinhasTelefonica']['data'];
            $data['LinhasTelefonica']['data'] = revertDate($date);
            $devolucao = $data['LinhasTelefonica']['devolucao'];
            $data['LinhasTelefonica']['devolucao'] = revertDate($devolucao);

            if ($this->LinhasTelefonica->save($data)) {
                $this->Session->setFlash(__('Alteração realizada com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível realizar a alteração. Favor, tente novamente.'));
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
            throw new NotFoundException(__('Linha Telefônica inválida.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->LinhasTelefonica->delete()) {
            $this->Session->setFlash(__('Registro removido com sucesso.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o registro. Favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listaLinhas($var1, $var2)
    {                        
        $modo = $var2;
        if ($modo == 1) {
            $associado_id = $var1;
            $options = array('conditions' => array('associado_id' => $associado_id));
            $linhasTelefonicas = $this->LinhasTelefonica->find('all', $options);        
        } else if ($modo == 2){            
            $numero = $var1;
            $options = array('conditions' => array('numero' => $numero));            
            $linhasTelefonicas = $this->LinhasTelefonica->find('all', $options);                    
        }                    
        $this->set(compact('linhasTelefonicas','modo'));    
    }

    /*public function formLinhas($id = null)
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
    }*/
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
