<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fb Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['fb_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fb Access Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['fb_access_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($user['User']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Biography'); ?></dt>
		<dd>
			<?php echo h($user['User']['biography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reset Password Code'); ?></dt>
		<dd>
			<?php echo h($user['User']['reset_password_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reset Password Date'); ?></dt>
		<dd>
			<?php echo h($user['User']['reset_password_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Private'); ?></dt>
		<dd>
			<?php echo h($user['User']['private']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Results'), array('controller' => 'quiz_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('controller' => 'quiz_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($user['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Option1'); ?></th>
		<th><?php echo __('Option2'); ?></th>
		<th><?php echo __('Option3'); ?></th>
		<th><?php echo __('Option4'); ?></th>
		<th><?php echo __('Option5'); ?></th>
		<th><?php echo __('Correct Option'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Hint'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['category_id']; ?></td>
			<td><?php echo $question['user_id']; ?></td>
			<td><?php echo $question['question']; ?></td>
			<td><?php echo $question['option1']; ?></td>
			<td><?php echo $question['option2']; ?></td>
			<td><?php echo $question['option3']; ?></td>
			<td><?php echo $question['option4']; ?></td>
			<td><?php echo $question['option5']; ?></td>
			<td><?php echo $question['correct_option']; ?></td>
			<td><?php echo $question['answer']; ?></td>
			<td><?php echo $question['hint']; ?></td>
			<td><?php echo $question['is_active']; ?></td>
			<td><?php echo $question['created']; ?></td>
			<td><?php echo $question['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), null, __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Quiz Results'); ?></h3>
	<?php if (!empty($user['QuizResult'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Result'); ?></th>
		<th><?php echo __('Is Delete'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['QuizResult'] as $quizResult): ?>
		<tr>
			<td><?php echo $quizResult['id']; ?></td>
			<td><?php echo $quizResult['user_id']; ?></td>
			<td><?php echo $quizResult['category_id']; ?></td>
			<td><?php echo $quizResult['result']; ?></td>
			<td><?php echo $quizResult['is_delete']; ?></td>
			<td><?php echo $quizResult['created']; ?></td>
			<td><?php echo $quizResult['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quiz_results', 'action' => 'view', $quizResult['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quiz_results', 'action' => 'edit', $quizResult['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quiz_results', 'action' => 'delete', $quizResult['id']), null, __('Are you sure you want to delete # %s?', $quizResult['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Quiz Result'), array('controller' => 'quiz_results', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
