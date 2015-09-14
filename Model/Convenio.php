<?php
App::uses('AppModel', 'Model');
/**
 * Convenio Model
 *
 * @property Grupo $Grupo
 * @property Compra $Compra
 */
class Convenio extends AppModel {

	public $displayField = 'nomeDoGrupo';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Grupo' => array(
			'className' => 'Grupo',
			'foreignKey' => 'grupo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Compra' => array(
			'className' => 'Compra',
			'foreignKey' => 'convenio_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function getStatus() {
        // this could be a find 'list' from
        // another model
        return array(
            1 => 'Ativo',
            2 => 'Inativo',
        );
	}

/**
 * Validation rules
 *
 * @var array
 */
/*	public $validate = array(
		'razaoSocial' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Razão Social" é obrigatório.'
		),
		'rua' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Rua" é obrigatório.'
		),
		'bairro' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Bairro" é obrigatório.'
		),
		'cidade' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Cidade" é obrigatório.'
		),
		'CEP' => array(
			'rule' => array('postal', '/^[0-9][0-9][0-9][0-9][0-9]-[0-9][0-9][0-9]$/'),
			'allowEmpty'=>true,
			'message'=>'O campo "CEP" é obrigatório. Padrão "XXXXX-XXX"'
		),
		'telefone' => array(
			'rule' => 'numeric',
			'allowEmpty'=>true,
			'message'=>'O campo "Telefone" é obrigatório.'
		),'nomeDoGrupo' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Razão Social" é obrigatório.'
		),
		'fax'=> array(),
		'percDesc'=> array(),
		'contato'=> array(),
		'status' => array(),
	);
*/
}
