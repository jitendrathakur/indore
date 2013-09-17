<div class="resultTemplates index">
	<h2><?php echo __('Result Templates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('header'); ?></th>
			<th><?php echo $this->Paginator->sort('footer'); ?></th>
			<th><?php echo $this->Paginator->sort('background_image'); ?></th>
			<th><?php echo $this->Paginator->sort('background_image_path'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($resultTemplates as $resultTemplate): ?>
	<tr>
		<td><?php echo h($resultTemplate['ResultTemplate']['id']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['name']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['header']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['footer']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['background_image']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['background_image_path']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['created']); ?>&nbsp;</td>
		<td><?php echo h($resultTemplate['ResultTemplate']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resultTemplate['ResultTemplate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resultTemplate['ResultTemplate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resultTemplate['ResultTemplate']['id']), null, __('Are you sure you want to delete # %s?', $resultTemplate['ResultTemplate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Result Template'), array('action' => 'add')); ?></li>
	</ul>
</div>
