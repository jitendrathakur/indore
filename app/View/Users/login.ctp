<div id="signin" class="edit_form">
  <h2 class="login"><?php  echo __('Login');?></h2>
    <?php
    echo $this->Form->create('User', array('url' => array('action' => 'login'), 'class' => 'edit_form'));
    ?>

    <?php
    echo $this->Form->input(
      'email',
      array(
        'label' => array(
          'text' => 'Email<div id="errorMessageEmail"></div><div id="errorMessage"></div>'
        ),
        'placeholder' => 'Email',
        'autofocus' => true,
        'class' => 'input_txt'
      )
    );
    echo $this->Form->input(
      'password',
      array(
        'label' => array(
          'text' => 'Password<div id="errorMessagePassword"></div>'
        ),
        'placeholder' => 'Password',
        'class' => 'input_txt'
      )
    );
    ?>
    
    <div class="input">
        <?php echo $this->Html->link('Forgot Password', array('action' => 'forgot_password'), array('escape' => false)); ?>
    </div>

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

