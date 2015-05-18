<?php
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

  public $useTable = 'users';
  public $displayField = 'login';
  
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
    'password' => array(
      'allowEmpty' => false,
      'message' => 'Por favor, informe uma senha válida.'
    )
  );

  public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }

    return true;
  }
}