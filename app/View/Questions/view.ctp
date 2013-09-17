<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Category']['name'], array('controller' => 'categories', 'action' => 'view', $question['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['User']['id'], array('controller' => 'users', 'action' => 'view', $question['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($question['Question']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option1'); ?></dt>
		<dd>
			<?php echo h($question['Question']['option1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option2'); ?></dt>
		<dd>
			<?php echo h($question['Question']['option2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option3'); ?></dt>
		<dd>
			<?php echo h($question['Question']['option3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option4'); ?></dt>
		<dd>
			<?php echo h($question['Question']['option4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option5'); ?></dt>
		<dd>
			<?php echo h($question['Question']['option5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correct Option'); ?></dt>
		<dd>
			<?php echo h($question['Question']['correct_option']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($question['Question']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hint'); ?></dt>
		<dd>
			<?php echo h($question['Question']['hint']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($question['Question']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($question['Question']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($question['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fb Id'); ?></th>
		<th><?php echo __('Fb Access Token'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Avatar'); ?></th>
		<th><?php echo __('Biography'); ?></th>
		<th><?php echo __('Reset Password Code'); ?></th>
		<th><?php echo __('Reset Password Date'); ?></th>
		<th><?php echo __('Private'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($question['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['fb_id']; ?></td>
			<td><?php echo $user['fb_access_token']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['slug']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['avatar']; ?></td>
			<td><?php echo $user['biography']; ?></td>
			<td><?php echo $user['reset_password_code']; ?></td>
			<td><?php echo $user['reset_password_date']; ?></td>
			<td><?php echo $user['private']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
