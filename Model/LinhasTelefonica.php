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

	public $_schema = array(
		'modo_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
    );   

    public function getModeList() {
        // this could be a find 'list' from
        // another model
        return array(
            1 => 'Por usuário',
            2 => 'Por número',
        );
	} 
}
