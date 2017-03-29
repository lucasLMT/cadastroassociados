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
        $this->Paginator->settings = array('order' => 'Compra.id DESC');
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

            $date = $data['Compra']['date'];
            $data['Compra']['date'] = revertDate($date);

            $data['Compra']['quantidade'] = $data['Compra']['quantidade'] + 1;

            if ($this->Compra->save($data)) {
                $this->Session->setFlash(__('Compra adicionada.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('Não foi possível adicionar a compra. Por favor, tente novamente.'));
            }
        } else if ($this->request->is('ajax')){
            $this->layout = false;

            $quantidade = $_GET['quantidade'] + 1;
            $associadoId = $_GET['associadoId'];

            //Retorna o array do associado relativo ao Id recebido
            $associadoConditions = array('conditions' => array('Associado.' . $this->Compra->Associado->primaryKey => $associadoId));
            $associado = $this->Compra->Associado->find('first', $associadoConditions);

            $cargoMealValue = $associado['Cargo']['mealvalue']; 
            if ($cargoMealValue == null)
                $cargoMealValue = 0;    

            $response = $this->render();

            $jsonResponse = array(
                'html'       => $response->body(),
                'other_data' => array('foo' => 'bar'),
                'bar'        => 'foo'
            );

            $response->body($cargoMealValue * $quantidade);

        }
        $convenios = $this->Compra->Convenio->find('list', array('order' => 'razaoSocial ASC'));
        $associados = $this->Compra->Associado->find('list', array('order' => 'nome ASC'));
        $periodos = $this->Compra->Periodo->find('list');
        $this->set(compact('convenios', 'associados', 'periodos'));
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

            $referencia = $data['Compra']['date'];
            $data['Compra']['date'] = revertDate($referencia);

            if ($this->Compra->save($data)) {
                $this->Session->setFlash(__('Compra salva.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a compra. Por favor, Tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
            $comprasTmp = $this->Compra->find('first', $options);

            $referencia = $comprasTmp['Compra']['date'];
            $comprasTmp['Compra']['date'] = revertDate($referencia);

            $comprasTmp['Compra']['quantidade'] = $comprasTmp['Compra']['quantidade'] - 1;

            $this->request->data = $comprasTmp;

        }
        $convenios = $this->Compra->Convenio->find('list', array('order' => 'razaoSocial ASC'));
        $associados = $this->Compra->Associado->find('list', array('order' => 'nome ASC'));
        $periodos = $this->Compra->Periodo->find('list');
        $this->set(compact('convenios', 'associados', 'periodos'));
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

    public function todasCompras()
    {
        $this->Compra->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $this->set('compras', $this->Paginator->paginate());
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
