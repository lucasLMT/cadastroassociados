<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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

    public $paginate = array(
        // other keys here.
        'maxLimit' => 1000
    );
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
            throw new NotFoundException(__('Associado inválido.'));
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
        $model = ClassRegistry::init('Associado');

        if ($this->request->is('post')) {
            $this->Associado->create();
            $data = $this->request->data;

            $dataDeAdmissao = $data['Associado']['dataDeAdmissao'];
            $data['Associado']['dataDeAdmissao'] = revertDate($dataDeAdmissao);
            $dataDesligamento = $data['Associado']['dataDesligamento'];
            $data['Associado']['dataDesligamento'] = revertDate($dataDesligamento);
            $dataDeNascimento = $data['Associado']['dataDeNascimento'];
            $data['Associado']['dataDeNascimento'] = revertDate($dataDeNascimento);

            if ($this->Associado->save($data)) {
                $this->Session->setFlash(__('Associado adicionado.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível adicionar o associado. Por favor, Tente novamente.'));
            }
        }
        $cargos = $this->Associado->Cargo->find('list');
        $areas = $this->Associado->Area->find('list');
        $ativos = $model->getAtivo();
        $sexos = $model->getSexo();
        $estadocivils = $model->getEstadocivil();
        $filhos = $model->getFilhos();
        $this->set(compact('cargos', 'areas', 'ativos', 'sexos', 'estadocivils', 'filhos'));
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
            throw new NotFoundException(__('Associado inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
            $dataDeAdmissao = $data['Associado']['dataDeAdmissao'];
            $data['Associado']['dataDeAdmissao'] = revertDate($dataDeAdmissao);
            $dataDesligamento = $data['Associado']['dataDesligamento'];
            $data['Associado']['dataDesligamento'] = revertDate($dataDesligamento);
            $dataDeNascimento = $data['Associado']['dataDeNascimento'];
            $data['Associado']['dataDeNascimento'] = revertDate($dataDeNascimento);

            if ($this->Associado->save($data)) {
                $this->Session->setFlash(__('Associado salvo.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o associado. Por favor, Tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Associado.' . $this->Associado->primaryKey => $id));
            $associadosTmp = $this->Associado->find('first', $options);

            $dataDeAdmissao = $associadosTmp['Associado']['dataDeAdmissao'];
            $associadosTmp['Associado']['dataDeAdmissao'] = revertDate($dataDeAdmissao);
            $dataDesligamento = $associadosTmp['Associado']['dataDesligamento'];
            $associadosTmp['Associado']['dataDesligamento'] = revertDate($dataDesligamento);
            $dataDeNascimento = $associadosTmp['Associado']['dataDeNascimento'];
            $associadosTmp['Associado']['dataDeNascimento'] = revertDate($dataDeNascimento);

            $this->request->data = $associadosTmp;
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
            throw new NotFoundException(__('Associado inválido.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Associado->delete()) {
            $this->Session->setFlash(__('Associado removido.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o associado. Por favor, Tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listaAniversario($id = null)
    {
        $data = date("m-d");
        $options = array('conditions' => array("strftime('%m-%d', Associado.dataDeNascimento)" => $data));
        $aniversariantes = $this->Associado->find('all', $options);
        $this->set(compact('aniversariantes'));
    }

    public function sendEmail($associados, $dest = null)
    {
        $dest = 'destinatario@gmail.com';
        $Email = new CakeEmail('gmail');
        $Email->to($dest);
        $Email->subject('Aniversariantes do dia.');
        //$Email->replyTo();
        $Email->from('AFSEBRAE');
        $Email->message('Test message.');
        $Email->send('message');
        return $this->redirect(array('action' => 'index'));
    }

    /*public function send_email($dest=null)
    {
        $Email = new CakeEmail('gmail');
        $Email->to($dest);
        $Email->subject('Automagically generated email');
        $Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
        $Email->from('your_user@gmail.com');
        $Email->send();
        return $this->redirect(array('action' => 'index'));
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
