<div id="signin" class="edit_form">
	<div class="users view well">
		<h2><?php echo __('Update Profile'); ?></h2>
		<?php
		echo $this->Form->create('User',array('type'=>'file'));
		echo $this->Form->input('UserProfile.firstname');
		echo $this->Form->input('UserProfile.lastname');
		echo $this->Form->input('UserProfile.dob',array('id'=>'datedob'));
		echo $this->Form->input('UserProfile.gender',array('type'=>'select','options'=>Configure::read('gender')));
		echo $this->Form->input('Zipcode.zipcode',array('id'=>'zipcode'));
		echo $this->Form->hidden('UserProfile.zipcode_id',array('id'=>'zipcode_id'));
		echo $this->Form->input('UserProfile.contact');
		echo $this->Form->input('UserProfile.address',array("type"=>'textarea',"lable"=>'Address'));
		echo $this->Form->input('UserProfile.avatar',array("type"=>'file',"lable"=>'Image')); 
		if(!empty($this->request->data['UserProfile']['avatar'])){
			$imgPath = 	"upload/".$this->request->data['UserProfile']['avatar'];
		} else {
			$imgPath = 	"empty.jpeg";
		}
		?>
		<div class="pr_pic"><?php echo $this->Html->image($imgPath,array('width'=>'70','height'=>'100')); ?></div>
		<div>&nbsp;</div>
		<div><?php echo $this->Form->submit(__('Update'), array('class'  => 'btn btn-primary','div' => false,  ));?></div>
		<?php echo $this->Form->end(); ?>
		<div class="clearfix"></div>
	</div>
</div>
	