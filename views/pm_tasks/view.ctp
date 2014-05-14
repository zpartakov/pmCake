<div class="pmTasks view">
<h2><?php  __('Pm Task');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['parent_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTask['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $pmTask['PmProject']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Priority'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['priority']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTask['PmMember']['name'], array('controller' => 'pm_members', 'action' => 'view', $pmTask['PmMember']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Assigned To'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['assigned_to']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['start_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Due Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['due_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estimated Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['estimated_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Actual Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['actual_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['comments']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Completion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['completion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Assigned'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['assigned']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Phase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['parent_phase']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complete Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['complete_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Service'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['service']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Milestone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['milestone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mod Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTask['PmTask']['mod_date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Task', true), array('action' => 'edit', $pmTask['PmTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Task', true), array('action' => 'delete', $pmTask['PmTask']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmTask['PmTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('controller' => 'pm_tasks_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('controller' => 'pm_tasks_times', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags', true), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag', true), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Pm Tasks Times');?></h3>
	<?php if (!empty($pmTask['PmTasksTime'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Project'); ?></th>
		<th><?php __('Task'); ?></th>
		<th><?php __('Owner'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Hours'); ?></th>
		<th><?php __('Comments'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pmTask['PmTasksTime'] as $pmTasksTime):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $pmTasksTime['id'];?></td>
			<td><?php echo $pmTasksTime['project'];?></td>
			<td><?php echo $pmTasksTime['task'];?></td>
			<td><?php echo $pmTasksTime['owner'];?></td>
			<td><?php echo $pmTasksTime['date'];?></td>
			<td><?php echo $pmTasksTime['hours'];?></td>
			<td><?php echo $pmTasksTime['comments'];?></td>
			<td><?php echo $pmTasksTime['created'];?></td>
			<td><?php echo $pmTasksTime['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pm_tasks_times', 'action' => 'view', $pmTasksTime['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pm_tasks_times', 'action' => 'edit', $pmTasksTime['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pm_tasks_times', 'action' => 'delete', $pmTasksTime['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmTasksTime['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('controller' => 'pm_tasks_times', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Pm Members');?></h3>
	<?php if (!empty($pmTask['PmMember'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization'); ?></th>
		<th><?php __('Login'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Email Work'); ?></th>
		<th><?php __('Email Home'); ?></th>
		<th><?php __('Phone Work'); ?></th>
		<th><?php __('Phone Home'); ?></th>
		<th><?php __('Mobile'); ?></th>
		<th><?php __('Fax'); ?></th>
		<th><?php __('Comments'); ?></th>
		<th><?php __('Profil'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Logout Time'); ?></th>
		<th><?php __('Last Page'); ?></th>
		<th><?php __('Timezone'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pmTask['PmMember'] as $pmMember):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $pmMember['id'];?></td>
			<td><?php echo $pmMember['organization'];?></td>
			<td><?php echo $pmMember['login'];?></td>
			<td><?php echo $pmMember['password'];?></td>
			<td><?php echo $pmMember['name'];?></td>
			<td><?php echo $pmMember['title'];?></td>
			<td><?php echo $pmMember['email_work'];?></td>
			<td><?php echo $pmMember['email_home'];?></td>
			<td><?php echo $pmMember['phone_work'];?></td>
			<td><?php echo $pmMember['phone_home'];?></td>
			<td><?php echo $pmMember['mobile'];?></td>
			<td><?php echo $pmMember['fax'];?></td>
			<td><?php echo $pmMember['comments'];?></td>
			<td><?php echo $pmMember['profil'];?></td>
			<td><?php echo $pmMember['created'];?></td>
			<td><?php echo $pmMember['logout_time'];?></td>
			<td><?php echo $pmMember['last_page'];?></td>
			<td><?php echo $pmMember['timezone'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pm_members', 'action' => 'view', $pmMember['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pm_members', 'action' => 'edit', $pmMember['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pm_members', 'action' => 'delete', $pmMember['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmMember['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Tags');?></h3>
	<?php if (!empty($pmTask['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cdu'); ?></th>
		<th><?php __('Lib'); ?></th>
		<th><?php __('Last Update'); ?></th>
		<th><?php __('Rem1'); ?></th>
		<th><?php __('Rem2'); ?></th>
		<th><?php __('Rem3'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pmTask['Tag'] as $tag):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $tag['id'];?></td>
			<td><?php echo $tag['cdu'];?></td>
			<td><?php echo $tag['lib'];?></td>
			<td><?php echo $tag['last_update'];?></td>
			<td><?php echo $tag['rem1'];?></td>
			<td><?php echo $tag['rem2'];?></td>
			<td><?php echo $tag['rem3'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag', true), array('controller' => 'tags', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
