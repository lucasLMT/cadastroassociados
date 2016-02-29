<?php
App::uses('AppModel', 'Model');

/**
 * Compra Model
 *
 * @property Convenio $Convenio
 * @property Associado $Associado
 */
class Compra extends AppModel
{

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

}
