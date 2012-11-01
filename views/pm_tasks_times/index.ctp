<?php
App::import('Lib', 'functions'); //imports app/libs/functions
?>
<div class="pmTasksTimes index">
	<h2><?php __('Pm Tasks Times');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('project');?></th>
			<th><?php echo $this->Paginator->sort('task');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('hours');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmTasksTimes as $pmTasksTime):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmTasksTime['PmTasksTime']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pmTasksTime['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $pmTasksTime['PmProject']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pmTasksTime['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $pmTasksTime['PmTask']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pmTasksTime['PmMember']['name'], array('controller' => 'pm_members', 'action' => 'view', $pmTasksTime['PmMember']['id'])); ?>
		</td>
		<td><?php echo $pmTasksTime['PmTasksTime']['date']; ?>&nbsp;</td>
		<td><?php echo $pmTasksTime['PmTasksTime']['hours']; ?>&nbsp;</td>
		<td><?php echo $pmTasksTime['PmTasksTime']['comments']; ?>&nbsp;</td>
		<td><?php echo $pmTasksTime['PmTasksTime']['created']; ?>&nbsp;</td>
		<td><?php echo $pmTasksTime['PmTasksTime']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmTasksTime['PmTasksTime']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmTasksTime['PmTasksTime']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmTasksTime['PmTasksTime']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmTasksTime['PmTasksTime']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
