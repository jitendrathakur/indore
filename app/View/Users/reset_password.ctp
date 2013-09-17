<div id="signin" class="edit_form">
  <h2 class="login"><?php  echo __('Change Password');?></h2>
    <?php
    echo $this->Form->create('User');
    
    echo $this->Form->input(
      'currentpassword',
      array(
        'label' => array(
          'text' => 'Current Password<div id="errorMessageCurrentpassword"></div><div id="errorMessage"></div>'
        ),
        'type' => 'password', 
        'autofocus' => true,
        'class' => 'input_txt'
      )
    );
    echo $this->Form->input(
      'password',
      array(
        'label' => array(
          'text' => 'Password<div id="errorMessagePassword"></div><div id="errorMessage"></div>'
        ),
        'autofocus' => true,
        'class' => 'input_txt'
      )
    );
    echo $this->Form->input(
      'password2',
      array(
        'label' => array(
          'text' => 'Cofirm Password<div id="errorMessagePassword2"></div><div id="errorMessage"></div>'
        ),
        'type' => 'password', 
        'autofocus' => true,
        'class' => 'input_txt'
      )
    );
    ?>
    <div class="actions edit_btns facebook">
    <?php
    echo $this->Form->submit(
      __('Sign in'),
      array(
        'class'  => 'search_button edit_bt',
        'div'    => false 
      )
    );          
    
    ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

