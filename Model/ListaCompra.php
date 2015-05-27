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
        )
	);

	public $_schema = array(
		'associado_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
        'data_inicio' => array(
            'type' => 'date',
            'length' => 200,
            'null' => false,
        ),
        'data_fim' => array(
            'type' => 'date',
            'length' => 150,
            'null' => false,
        ),
    );

    public $validate = array(
        'associado_id' => array(
                'rule' => 'notempty',
                'message' => "O nome deve ser preenchido",
        ),
        'data_inicio' => array(
                'rule' => 'date',
                'message' => "O e-mail deve ser preenchido",
        ),
        'data_fim' => array(
                'rule' => 'date',
                'message' => "A mensagem deve ser preenchida",
        ),
    );

}