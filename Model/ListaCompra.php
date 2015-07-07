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
		'Convenio' => array(
			'className' => 'Convenio',
			'foreignKey' => 'convenio_id'
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
		'convenio_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
		'modo_id' => array(
			'type' => 'integer',
			'null' => false,
		),
		'todos' => array(
			'type' => 'boolean',
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

	public function getModeList() {
        // this could be a find 'list' from
        // another model
        return array(
            1 => 'Analítico',
            2 => 'Sintético',
        );
	}

}
