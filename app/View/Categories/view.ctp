<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flag'); ?></dt>
		<dd>
			<?php echo h($category['Category']['flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Featured'); ?></dt>
		<dd>
			<?php echo h($category['Category']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Results'), array('controller' => 'quiz_results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('controller' => 'quiz_results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($category['Question'])): ?>
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
	<?php foreach ($category['Question'] as $question): ?>
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
	<?php if (!empty($category['QuizResult'])): ?>
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
	<?php foreach ($category['QuizResult'] as $quizResult): ?>
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
