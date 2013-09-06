<div class="quizResults index">
	<h2><?php echo __('Quiz Results'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result'); ?></th>
			<th><?php echo $this->Paginator->sort('is_delete'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($quizResults as $quizResult): ?>
	<tr>
		<td><?php echo h($quizResult['QuizResult']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quizResult['User']['id'], array('controller' => 'users', 'action' => 'view', $quizResult['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($quizResult['Category']['name'], array('controller' => 'categories', 'action' => 'view', $quizResult['Category']['id'])); ?>
		</td>
		<td><?php echo h($quizResult['QuizResult']['result']); ?>&nbsp;</td>
		<td><?php echo h($quizResult['QuizResult']['is_delete']); ?>&nbsp;</td>
		<td><?php echo h($quizResult['QuizResult']['created']); ?>&nbsp;</td>
		<td><?php echo h($quizResult['QuizResult']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quizResult['QuizResult']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quizResult['QuizResult']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quizResult['QuizResult']['id']), null, __('Are you sure you want to delete # %s?', $quizResult['QuizResult']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Quiz Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
