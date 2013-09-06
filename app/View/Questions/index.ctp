<div class="questions index">
	<h2><?php echo __('Questions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<th><?php echo $this->Paginator->sort('option1'); ?></th>
			<th><?php echo $this->Paginator->sort('option2'); ?></th>
			<th><?php echo $this->Paginator->sort('option3'); ?></th>
			<th><?php echo $this->Paginator->sort('option4'); ?></th>
			<th><?php echo $this->Paginator->sort('option5'); ?></th>
			<th><?php echo $this->Paginator->sort('correct_option'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th><?php echo $this->Paginator->sort('hint'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($question['Category']['name'], array('controller' => 'categories', 'action' => 'view', $question['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($question['User']['id'], array('controller' => 'users', 'action' => 'view', $question['User']['id'])); ?>
		</td>
		<td><?php echo h($question['Question']['question']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['option1']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['option2']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['option3']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['option4']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['option5']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['correct_option']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['answer']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['hint']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['created']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
