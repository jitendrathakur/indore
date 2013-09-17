<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Question $Question
 * @property QuizResult $QuizResult
 * @property Question $Question
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'private' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'QuizResult' => array(
			'className' => 'QuizResult',
			'foreignKey' => 'user_id',
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Question' => array(
			'className' => 'Question',
			'joinTable' => 'questions_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'question_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	/**
     * callback function
     *
     * @return void.
     */
  public function beforeSave($options = Array()) {
      if(isset($this->data['User']['password'])) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
      }
      return true;
  }

   /**
     * Method used to check for password confirmation
     *
     * @return boolean If password is not match with confirm_password then return false otherwise return true
     */
  public function confirmPassword()
  {
      // Check password and confirm_password are same or not
      return ($this->data['User']['password'] == $this->data['User']['password2']);
  }//end confirmPassword()


  /**
     * Callback function to handle logic after save operation.   
     *
     * @access public
     *
     * @return void
     */
  public function afterSave($created)
  {
      // Call to function to save user group.
      $userId = $this->id;
      if (!empty($this->data['User']['group_id'])) {
        $parentGroupId = $this->data['User']['group_id'];
      }
      if (!empty($userId) && !empty($parentGroupId)) {
        $this->setUserGroup($userId, $parentGroupId);
      }
  }//end afterSave()


   /**
     * Function to set user group.
     *
     * @param integer $userId        User id.
     * @param integer $parentGroupId Group id. 
     *
     * @return void
     */
  public function setUserGroup($userId, $parentGroupId)
  {
      $aro = ClassRegistry::init('Aro');
      // Condition to delete existing record from aros
      $conditions = array('Aro.foreign_key' => $userId);
      // Delete the member from aros table
      $aro->deleteAll($conditions);

      // Build data to save
      $data = array(
        'parent_id'   => $parentGroupId,
        'foreign_key' => $userId,
        'alias'       => 'User::' . $userId,
      );

      // Prepare model to save data
      $aro->create();
      // Save needed data
      $aro->save($data);

  }//end setUserGroup()

}
