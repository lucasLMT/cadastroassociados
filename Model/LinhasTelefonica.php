<?php
App::uses('AppModel', 'Model');
/**
 * LinhasTelefonica Model
 *
 * @property Associado $Associado
 */
class LinhasTelefonica extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Associado' => array(
			'className' => 'Associado',
			'foreignKey' => 'associado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
