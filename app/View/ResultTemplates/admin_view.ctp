<div class="resultTemplates view">
<h2><?php echo __('Result Template'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Header'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['header']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Footer'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['footer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Background Image'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['background_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Background Image Path'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['background_image_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($resultTemplate['ResultTemplate']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Result Template'), array('action' => 'edit', $resultTemplate['ResultTemplate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Result Template'), array('action' => 'delete', $resultTemplate['ResultTemplate']['id']), null, __('Are you sure you want to delete # %s?', $resultTemplate['ResultTemplate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Result Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result Template'), array('action' => 'add')); ?> </li>
	</ul>
</div>
