<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 */
class Area extends AppModel {

    public $displayField = 'nome';

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
			'message'=>'Este campo é obrigatório.'
		),
	);
}
