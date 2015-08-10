<?php
App::uses('AppModel', 'Model');
/**
 * Cargo Model
 *
 * @property Associado $Associado
 */
class Cargo extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    
    public $displayField = 'nome';
 
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Associado' => array(
			'className' => 'Associado',
			'foreignKey' => 'cargo_id',
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
/*	public $validate = array(
		'nome' => array(
			'rule' => 'alphaNumeric',
			'required'=> true,
			'allowEmpty'=> false,
			'message'=>'Este campo é obrigatório.'
		),
		'valorAlmoço'=>array(
			'rule' => array('money', 'left'),
			'allowEmpty'=>true,
			'message' => 'Por favor, informe um valor com uma quantia monetária'
		)
	);	
*/
}
