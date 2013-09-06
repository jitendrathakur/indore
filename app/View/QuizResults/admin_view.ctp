<div class="quizResults view">
<h2><?php echo __('Quiz Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quizResult['QuizResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quizResult['User']['id'], array('controller' => 'users', 'action' => 'view', $quizResult['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quizResult['Category']['name'], array('controller' => 'categories', 'action' => 'view', $quizResult['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo h($quizResult['QuizResult']['result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Delete'); ?></dt>
		<dd>
			<?php echo h($quizResult['QuizResult']['is_delete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quizResult['QuizResult']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quizResult['QuizResult']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quiz Result'), array('action' => 'edit', $quizResult['QuizResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quiz Result'), array('action' => 'delete', $quizResult['QuizResult']['id']), null, __('Are you sure you want to delete # %s?', $quizResult['QuizResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
