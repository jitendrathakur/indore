<div id="signin" class="edit_form">
  <h2 class="login"><?php  echo __('Forgot Password');?></h2>
    <?php
    echo $this->Form->create('User');
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
    ?>
    <div class="actions edit_btns span">
    <?php
    echo $this->Form->submit(
      __('Submit'),
      array(
        'class'  => 'search_button edit_bt',
        'div'    => false 
      )
    );          
    
    ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

