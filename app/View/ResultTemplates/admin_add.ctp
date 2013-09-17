<div class="resultTemplates form">
<?php echo $this->Form->create('ResultTemplate'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Result Template'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('header');
		echo $this->Form->input('footer');
		echo $this->Form->input('background_image');
		echo $this->Form->input('background_image_path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Result Templates'), array('action' => 'index')); ?></li>
	</ul>
</div>
