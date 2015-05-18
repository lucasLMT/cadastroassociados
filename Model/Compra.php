<?php
App::uses('AppModel', 'Model');
/**
 * Compra Model
 *
 * @property Convenio $Convenio
 * @property Associado $Associado
 */
class Compra extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Convenio' => array(
			'className' => 'Convenio',
			'foreignKey' => 'convenio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Associado' => array(
			'className' => 'Associado',
			'foreignKey' => 'associado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nomeAssociado' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Nome" é obrigatório.'
		),
		'valor'=> array(
			'rule' => array('money', 'left'),
			'message' => 'Por favor, informe um valor com uma quantia monetária'
		),
		'referencia'=> array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Referência" é obrigatório.'
		),
		'observacao'=> array()
	);		
}
