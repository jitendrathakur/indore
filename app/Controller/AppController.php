<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  /**
   * Array to hold component.
   *
   * @var void
   */
  public $components = array(
    'Acl',
    'Auth' => array(
      'loginAction' => array(
        'controller' => 'users',
        'action'     => 'index',
        'admin'      => false
      ),
      'authenticate' => array(
        'Form' => array(
          'fields' => array(
            'username' => 'email'
          )
        )
      ),
      //'authorize' => 'Controller',
    ),
    'Session',    
  );


  /**
   * Array to hold helper.
   *
   * @var void
   */
  public $helpers = array(
   'Html',
   'Form',
   'Session',
   'Js',   
  );


   public function beforeFilter() {   

    if ($this->Session->read('Auth.User.userGroup') == 'Admin') {
      $this->Auth->allow('*');
      if ($this->here == '/') {
        $this->redirect(array('controller' => 'users', 'action' => 'home', 'admin' => true));
      }      
    } else if ($this->Session->read('Auth.User.userGroup') == 'General') {
      if ($this->request->prefix != 'admin') {
        $this->Auth->allow('*');
      } else {
        $this->redirect('/');
      }
    } else {
      $this->Auth->allow('signup', 'login', 'forgot_password','reset_password', 'reset_new', 'sampleform', 'samplesurveylist', 'pixlefire', 'securitysha256md5crypthiddenprohibited');

    }

    

    if ($this->request->prefix == 'admin') {
      $this->layout = 'admin';

    }

    $this->Auth->allow('*');

  }//end beforeFilter()

 /**
  * Function to send json response. This function is generally used when an ajax request is made
  *
  * @param array $data Data to be sent in json response
  * @param boolean $jsonHeaders Whether to include json header or not
  *
  * @return void
  */
  protected function sendJson($data, $jsonHeaders = true)
  {
    return new CakeResponse(array(
      'body' => json_encode($data),
      'type' => 'application/json',
    ));
  }//end sendJson()


  /**
   * Function to set the message in session
   *
   * This function uses Session components setFlash message
   *
   * @param string $message Message to be flashed
   * @param string $class   Message class, default is 'success'
   *
   * @return void
   */
  protected function setFlash($message, $class = 'success')
  {
    $option = array('class' => 'alert alert-' . $class);
    $this->Session->setFlash($message, 'Common/flash-message', $option);
  }//end setFlash()


  public function beforeRender() {
    $this->set(
        'twitterBootstrapCreateOptions', 
        array(
         'class'         => 'form-horizontal well',
         'inputDefaults' => array(
                             'div'     => array('class' => 'control-group'),
                             'label'   => array('class' => 'control-label'),
                             'error'   => array('attributes' => array(
                                                                 'wrap' => 'span',
                                                                 'class' => 'help-inline',
                                                                )
                                          ),
                             'between' => '<div class="controls">',
                             'after'   => '</div>',
                             'format'  => array('before', 'label', 'between', 'input', 'error', 'after')
                            ),
        )
    );
    $this->set(
        'twitterBootstrapEndOptions',
        array(
            'label' => __('Submit'),
            'class' => 'btn btn-primary',
            'div'   => array('class' => 'form-actions'),
        )
    );    

    $this->set('baseUrl', Router::url('/', true));
   
  }//end beforeRender()


  protected function _sendEmail($options = array())
  {
    // First use email component
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();

    $defaults = array(
      'to'          => null,
      'from'        => null,
      'replyTo'     => null,
      'cc'          => array(),
      'bcc'         => array(),
      'subject'     => null,
      'template'    => null,
      'emailFormat' => 'html',
      'attachments' => array(),
      'viewVars'    => null,
    );
    // Merge the passed options with the default ones
    $options = array_merge($defaults, $options);
    // If we don't have a replyTo then set 'from' as 'replyTo'
    if (empty($options['replyTo'])) {
      $options['replyTo'] = $options['from'];
    }

    // Set the options in Email component
    foreach ($options as $option => $value) {
      $email->{$option}($value);
    }

    // Send the email
    return $email->send();
  }// end sendEmail()


}
