<?php
App::uses('AppModel', 'Model');
/**
 * Compra Model
 *
 * @property Convenio $Convenio
 * @property Associado $Associado
 */
class ListaCompra extends AppModel {

	public $useTable = false;

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
			),
	    'Compra' => array(
	        'className' => 'Compra',
	        'foreignKey' => 'associado_id'
	    ),
		'Periodo' => array(
			'className' => 'Periodo',
			'foreignKey' => 'periodo_id'
		),
	);

	public $_schema = array(
		'associado_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
        'periodo_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
    );

    public $validate = array(
        'associado_id' => array(
                'rule' => 'notempty',
                'message' => "O nome deve ser preenchido",
        ),
        'periodo_id' => array(
                'rule' => 'notempty',
                'message' => "O período deve ser preenchido",
        ),
    );

}
