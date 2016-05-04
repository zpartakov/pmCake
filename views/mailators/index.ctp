<div class="mailators index">
	<h2><?php __('Mailators');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('pm_organization_id');?></th>
			<th><?php echo $this->Paginator->sort('pm_project_id');?></th>
			<th><?php echo $this->Paginator->sort('pm_task_id');?></th>
			<th><?php echo $this->Paginator->sort('statut_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('mailfrom');?></th>
			<th><?php echo $this->Paginator->sort('mailto');?></th>
			<th><?php echo $this->Paginator->sort('mailcc');?></th>
			<th><?php echo $this->Paginator->sort('mailbcc');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<th><?php echo $this->Paginator->sort('rem');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mailators as $mailator):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mailator['Mailator']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mailator['PmOrganization']['name'], array('controller' => 'pm_organizations', 'action' => 'view', $mailator['PmOrganization']['id'])); ?>
		</td>
		<td><?php echo $mailator['Mailator']['pm_project_id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mailator['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $mailator['PmTask']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mailator['Statut']['id'], array('controller' => 'statuts', 'action' => 'view', $mailator['Statut']['id'])); ?>
		</td>
		<td><?php echo $mailator['Mailator']['date']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['last_modified']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['mailfrom']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['mailto']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['mailcc']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['mailbcc']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['subject']; ?>&nbsp;</td>
		<td><?php echo $mailator['Mailator']['rem']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mailator['Mailator']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mailator['Mailator']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mailator['Mailator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailator['Mailator']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mailator', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Organizations', true), array('controller' => 'pm_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Organization', true), array('controller' => 'pm_organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuts', true), array('controller' => 'statuts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Statut', true), array('controller' => 'statuts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mail Answers', true), array('controller' => 'mail_answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mail Answer', true), array('controller' => 'mail_answers', 'action' => 'add')); ?> </li>
	</ul>
</div>