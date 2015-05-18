<?php
App::uses('AppModel', 'Model');
/**
 * Grupo Model
 *
 * @property Convenio $Convenio
 */
class Grupo extends AppModel {

    public $displayField = 'nome';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Convenio' => array(
			'className' => 'Convenio',
			'foreignKey' => 'grupo_id',
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
	public $validate = array(
		'nome' => array(
			'rule' => 'alphaNumeric',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'O campo "Nome" é obrigatório.'
		)
	);	

}
