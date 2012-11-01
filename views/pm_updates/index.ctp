<div class="pmUpdates index">
	<h2><?php __('Pm Updates');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('item');?></th>
			<th><?php echo $this->Paginator->sort('member');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmUpdates as $pmUpdate):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmUpdate['PmUpdate']['id']; ?>&nbsp;</td>
		<td><?php echo $pmUpdate['PmUpdate']['type']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pmUpdate['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $pmUpdate['PmTask']['id'])); ?>
		</td>
		<td><?php echo $pmUpdate['PmUpdate']['member']; ?>&nbsp;</td>
		<td><?php echo $pmUpdate['PmUpdate']['comments']; ?>&nbsp;</td>
		<td><?php echo $pmUpdate['PmUpdate']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmUpdate['PmUpdate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmUpdate['PmUpdate']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmUpdate['PmUpdate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmUpdate['PmUpdate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pm Update', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>