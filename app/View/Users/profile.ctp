<?php
	$paypalEmail = '';
	$isPaypalEmailVarified = 0;
	if(!empty($user_info['User']['email'])){
		$paypalEmail = $user_info['User']['email'];
		$isPaypalEmailVarified = 1;
	} else {
		$paypalEmail = 'N/A';
	}
?>
	<div id="" class="edit_form">
	<div class="users view well dl-horizontal">
<h2 class="user"><?php echo __('My Profile'); ?></h2>
<?php if(!empty($user_info['UserProfile']['avatar'])){ ?>

	<div class="profile_pic"><?php echo $this->Html->image("upload/".$user_info['UserProfile']['avatar'], array('width'=>'70','height'=>'100')); ?></div>

	<?php }else{ ?>

	<div class="profile_pic"><?php echo $this->Html->image("empty.jpeg", array('width'=>'100','height'=>'100')); ?></div>
	
	<?php } ?>
	<dl>

	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo $user_info['User']['email']; ?>
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo 'xxxxxxxx'; ?> &nbsp;
			[
			<?php
			    echo $this->Html->link(
			      __('Change Password'),
			      array('action' => 'change_password'),
			      array(
			        'class'  => '',
			        'div'    => false,  
			      )
			    );          
		    ?>	
		    ]
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo $user_info['UserProfile']['firstname']; ?>
			
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Lastname'); ?></dt>
		<dd>
				<?php echo $user_info['UserProfile']['lastname']; ?>
				&nbsp;
		</dd>
	</div>
	<div class="profile_data">
	
		<dt class="pull-left span4"><?php echo __('Date of Birth'); ?></dt>
		<dd>
			<?php echo $user_info['UserProfile']['dob']; ?>
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Gender'); ?></dt>
		<dd>

			<?php 
			if($user_info['UserProfile']['gender']=='m'){
				echo 'Male';
			} 
			else if($user_info['UserProfile']['gender']=='f'){
				echo 'Female';
			}
			else {
				echo '';
			}
			?>
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Mail address'); ?></dt>
		<dd>
			<?php 
			$mailingAddress = '';
			if(!empty($user_info['Zipcode']['city'])){
				$mailingAddress .= $user_info['Zipcode']['city'].', ';
			}
			if(!empty($user_info['Zipcode']['state'])){
				$mailingAddress .= $user_info['Zipcode']['state'].', ';
			}
			if(!empty($user_info['Zipcode']['county'])){
				$mailingAddress .= $user_info['Zipcode']['county'].', ';
			}
			if(!empty($user_info['Zipcode']['zipcode'])){
				$mailingAddress .= $user_info['Zipcode']['zipcode'];
			}
			echo $mailingAddress;
			?>
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
		<dt class="pull-left span4"><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo $user_info['UserProfile']['contact']; ?>
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Account Balance(Current earned money)'); ?></dt>
		<dd>
			<?php  echo "$".$user_info['User']['points']; ?>
			&nbsp;
		</dd>
	</div>
	<?php
	$i = 1;
	
	foreach ($surveyInfo['todo'] as $srvInfo) { 
		if($i == 1 || $i == 2 || $i == 3){ ?>
		<div class="profile_data">
			<dt class="pull-left span4"><?php echo __('Survey #'.$i .':'); ?></dt>
			<dd>
				<?php echo "( ".$srvInfo." )";  $i++; ?>
				&nbsp;
			</dd>
		</div>
	<?php } 
	}
	?>

	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('30 days Challenge :'); ?></dt>
		<dd>
			<?php			
			$day = 0;
			foreach($surveyInfo['2'] as $thirty){
					if(!empty($thirty['User'])){
						$day++;
					}
			 }
			 echo $day; 
			 ?>
			&nbsp;
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><h4><?php echo __('Payment History'); ?></h4></dt>
		<dd>
		</dd>
	</div>
	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Paid Amount: '); ?></dt>
		<dd>
			<?php echo "$".$surveyAmount; ?>
		</dd>
	</div>

	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Request Payment:'); ?></dt>
		<dd><?php                
				if($user_info['User']['points'] > 0){?>
				<?php if($isPaypalEmailVarified == 1) { ?>
				    <?php
                        if ($user_info['User']['default_amount']  == 0) {
                        	$chellengeStatus = $surveyInfo['active_survey_type'];
                        } else {
                        	$chellengeStatus = 0;
                        }
				    ?>
					<a href="javascript:void(0);" id="payment_request" chellenge-status="<?php echo $chellengeStatus; ?>">Request</a>
					<span id="request_complete"></span>
				<?php 
					} else { 
						echo Configure::read('paypalEmailVarificationErrorMessage');
					}
				} 
				?>
			
		</dd>
	</div>

	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Date Requested Payment:'); ?></dt>
		<dd>
			<?php
				if(!empty($user_info['User']['request_date'])){
					echo h($this->Survey->dateFormat($user_info['User']['request_date'])); 
			 	}
		 	?>
		</dd>
	</div>

	<div class="profile_data">
		<dt class="pull-left span4"><?php echo __('Date Received Payment:'); ?></dt>
		<dd>
			<?php 
			if(isset($lastPaymentDate)){
		         echo h($this->Survey->dateFormat($lastPaymentDate)); 
		    } else {
		    	echo Configure::read('lastPaymentMessage');
		    }
			?>
		</dd>
	</div>
	
	<div class="profile_data">
	<dt class="pull-left span4"></dt>
		<dd>
	<?php
    echo $this->Html->link(
      __('Edit'),
      array('action' => 'edit_profile'),
      array(
        'class'  => 'search_button',
        'div'    => false,  
      )
    );          
    ?>	
		</dd>
	</div>
	</dl>
	
</div>
<?php //pr($user_info); ?>
</div>
	