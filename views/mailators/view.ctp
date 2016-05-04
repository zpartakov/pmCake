<div class="mailators view">
<h2><?php  __('Mailator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mailator['PmOrganization']['name'], array('controller' => 'pm_organizations', 'action' => 'view', $mailator['PmOrganization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['pm_project_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Task'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mailator['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $mailator['PmTask']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Statut'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mailator['Statut']['id'], array('controller' => 'statuts', 'action' => 'view', $mailator['Statut']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mailfrom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['mailfrom']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mailto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['mailto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mailcc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['mailcc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mailbcc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['mailbcc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['subject']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['attachment']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailator['Mailator']['rem']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mailator', true), array('action' => 'edit', $mailator['Mailator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mailator', true), array('action' => 'delete', $mailator['Mailator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailator['Mailator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mailators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mailator', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Mail Answers');?></h3>
	<?php if (!empty($mailator['MailAnswer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Mailator Id'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Last Modified'); ?></th>
		<th><?php __('Fulltext'); ?></th>
		<th><?php __('Rem'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mailator['MailAnswer'] as $mailAnswer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $mailAnswer['id'];?></td>
			<td><?php echo $mailAnswer['mailator_id'];?></td>
			<td><?php echo $mailAnswer['date'];?></td>
			<td><?php echo $mailAnswer['last_modified'];?></td>
			<td><?php echo $mailAnswer['fulltext'];?></td>
			<td><?php echo $mailAnswer['rem'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'mail_answers', 'action' => 'view', $mailAnswer['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'mail_answers', 'action' => 'edit', $mailAnswer['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'mail_answers', 'action' => 'delete', $mailAnswer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailAnswer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mail Answer', true), array('controller' => 'mail_answers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
