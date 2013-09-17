
<div class="users view well">
	<?php if(empty($user_info)){
			echo "Pleae edit profile";
		}else{
	 $name = $user_info['UserProfile']['firstname'].' '.$user_info['UserProfile']['lastname']; ?>
	
	<div class="heading"><?php echo __($name); ?></div>
	<div class="pull-left span2">
		<?php if(!empty($user_info['UserProfile']['avatar'])){ ?>
		<div class="profile_pic"><?php echo $this->Html->image("upload/".$user_info['UserProfile']['avatar'], array('width'=>'70','height'=>'100')); ?></div>
		<?php }else{ ?>
		<div class="profile_pic"><?php echo $this->Html->image("empty.jpeg", array('width'=>'100','height'=>'100')); ?></div>
		<?php } ?>
	</div>
	<div class="pull-left span6">
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo $user_info['User']['email']; ?>
				&nbsp;
			</dd>
		</div>
		
		<div class="profile_data">
		
			<dt class="pull-left span4"><?php echo __('Date of Birth'); ?></dt>
			<dd>
				<?php echo h($this->Survey->dateFormat($user_info['UserProfile']['dob'])); ?>
				&nbsp;
			</dd>
		</div>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Gender'); ?></dt>
			<dd>
				<?php
				$gender = '';
				if(!empty($user_info['UserProfile']['gender'])){
					if($user_info['UserProfile']['gender']=='m'){
						$gender = 'Male';
					}
					else if($user_info['UserProfile']['gender']=='f'){
						$gender = 'Female';
					}
				}
				?>
				<?php echo $gender; ?>
				&nbsp;
			</dd>
		</div>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Address'); ?></dt>
			<dd>
				<?php echo $user_info['UserProfile']['address']; ?>
				&nbsp;
			</dd>
		</div>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('City'); ?></dt>
			<dd>
				<?php echo $user_info['Zipcode']['city']; ?>
				&nbsp;
			</dd>
		</div>
		
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('County'); ?></dt>
			<dd>
				<?php echo $user_info['Zipcode']['county']; ?>
				&nbsp;
			</dd>
		</div>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('State'); ?></dt>
			<dd>
				<?php echo $user_info['Zipcode']['state']; ?>
				&nbsp;
			</dd>
		</div>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Zipcode'); ?></dt>
			<dd>
				<?php echo $user_info['Zipcode']['zipcode']; ?>
				&nbsp;
			</dd>
		</div>
	
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Contact'); ?></dt>
			<dd>
				<?php echo $user_info['UserProfile']['contact']; ?>
				&nbsp;
			</dd>
		</div>	
	</div>
	<?php } ?>
	<div class="clear">&nbsp;</div>
	<div><?php echo $this->Html->link( __('Edit'), array('action' => 'admin_edit_profile'), array('class'  => 'search_button','div' => false));?>	</div>
</div>