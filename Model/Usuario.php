<?php
App::uses('AppModel', 'Model');

/**
 * Usuario Model
 *
 */
class Usuario extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'login' => array(
            'allowEmpty' => false,
            'message' => 'Por favor, informe um login válido.'
        ),
        'message' => 'Por favor, informe uma senha válida.'
    );

}
