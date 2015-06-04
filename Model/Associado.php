<?php
App::uses('AppModel', 'Model');
/**
 * Associado Model
 *
 * @property Cargo $Cargo
 * @property Area $Area
 * @property Compra $Compra
 */
class Associado extends AppModel {

    public $displayField = 'nome';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
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
			'foreignKey' => 'associado_id',
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

/**
 * Validation rules
 *
 * @var array
 */
	/*public $validate = array(
		'nome' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Nome" é obrigatório.'
		),
		'endereco'=>array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Endereço" é obrigatório.'
		),
		'bairro'=>array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Bairro" é obrigatório.'
		),
		'dataDeAdmissao'=>array(
			'rule' => 'date',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Insira uma data válida.'
		),
		'dataDeNascimento'=>array(
			'rule' => 'date',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Insira uma data válida.'
		),
		'telefone'=>array(
			'rule' => 'numeric',
			'message'=>'Insira apenas números no campo "Telefone".'
		),
		'RG'=>array(
			'rule' => 'numeric',
			'allowEmpty'=>true,
			'message'=>'Insira apenas números no campo "RG".'
		),
		'estado civil'=>array(
			'rule'=>'alphaNumeric',
			'allowEmpty'=>true
		),
		'salario'=>array(
			'rule' => array('money', 'left'),
			'allowEmpty'=>true,
			'message' => 'Por favor, informe um valor com uma quantia monetária'
		),
		'valor adicional'=>array(
			'rule' => array('money', 'left'),
			'allowEmpty'=>true,
			'message' => 'Por favor, informe um valor com uma quantia monetária'
		),
		'mensalidade'=>array(
			'rule' => array('money', 'left'),
			'allowEmpty'=>true,
			'message' => 'Por favor, informe um valor com uma quantia monetária'
		)
	);	*/

}
