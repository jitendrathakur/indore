<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('name');
		echo $this->Form->input('flag');
		echo $this->Form->input('featured');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('slug');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Results'), array('controller' => 'quiz_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('controller' => 'quiz_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
