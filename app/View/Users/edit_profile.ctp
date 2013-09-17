<?php //debug($this->request->data); exit; ?>
	<link href="<?php echo $this->webroot; ?>css/jquery-ui.css" rel="stylesheet">
	<div id="signin" class="edit_form">
  
	<div class="users view well">
	<h2><?php echo __('Update Profile'); ?></h2>
	<?php echo $this->Form->create('User',array('type'=>'file')); ?>

	<?php echo $this->Form->input('UserProfile.firstname'); ?>
	<?php echo $this->Form->input('UserProfile.lastname'); ?>
	
	<?php echo $this->Form->input('UserProfile.dob',array('id'=>'datepicker')); ?>
	<?php echo $this->Form->input('UserProfile.gender'); ?>
	<?php echo $this->Form->input('Zipcode.zipcode',array('id'=>'zipcode')); ?>
	<?php echo $this->Form->input('UserProfile.contact'); ?>
	<?php //echo $this->Form->input('UserProfile.email_paypal', array('placeHolder' => 'Please enter your paypal verified email')); ?>
	<?php echo $this->Form->input('UserProfile.address',array("type"=>'textarea',"lable"=>'Address')); ?>

	<?php echo $this->Form->input('UserProfile.avatar',array("type"=>'file',"lable"=>'Image')); ?>

	<?php if(!empty($this->request->data['UserProfile']['avatar'])){ ?>

	<div class="pr_pic"><?php echo $this->Html->image("upload/".$this->request->data['UserProfile']['avatar']); ?></div>

	<?php } else{?>
	
	<div class="pr_pic"><?php echo $this->Html->image("empty.jpeg"); ?></div>
	<?php } ?>
	<?php echo $this->Form->hidden('UserProfile.zipcode_id',array('id'=>'zip_id'));?>

<div class="btn-sbmt">
	<?php
    echo $this->Form->submit(
      __('Update'),
      array(
        'class'  => 'search_button',
        'div'    => false,  
      )
    );          
    ?>	
    </div>
	<?php echo $this->Form->end(); ?>
	<div class="clearfix"></div>
</div>
<?php //pr($user_info); ?>

	</div>
	