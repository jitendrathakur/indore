<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Question'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('question');
		echo $this->Form->input('option1');
		echo $this->Form->input('option2');
		echo $this->Form->input('option3');
		echo $this->Form->input('option4');
		echo $this->Form->input('option5');
		echo $this->Form->input('correct_option');
		echo $this->Form->input('answer');
		echo $this->Form->input('hint');
		echo $this->Form->input('is_active');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
