<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fb_id');
		echo $this->Form->input('fb_access_token');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('slug');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('avatar');
		echo $this->Form->input('biography');
		echo $this->Form->input('reset_password_code');
		echo $this->Form->input('reset_password_date');
		echo $this->Form->input('private');
		echo $this->Form->input('Question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Results'), array('controller' => 'quiz_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('controller' => 'quiz_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
