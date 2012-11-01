<div class="pmMembers view">
<h2><?php  __('Pm Member');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['organization']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['login']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Work'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['email_work']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Home'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['email_home']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone Work'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['phone_work']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone Home'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['phone_home']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mobile'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['mobile']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['fax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['comments']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profil'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['profil']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Logout Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['logout_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Page'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['last_page']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timezone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmMember['PmMember']['timezone']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Member', true), array('action' => 'edit', $pmMember['PmMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Member', true), array('action' => 'delete', $pmMember['PmMember']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmMember['PmMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Pm Projects');?></h3>
	<?php if (!empty($pmMember['projects'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization'); ?></th>
		<th><?php __('Owner'); ?></th>
		<th><?php __('Priority'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Url Dev'); ?></th>
		<th><?php __('Url Prod'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Upload Max'); ?></th>
		<th><?php __('Phase Set'); ?></th>
		<th><?php __('Type'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pmMember['projects'] as $projects):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $projects['id'];?></td>
			<td><?php echo $projects['organization'];?></td>
			<td><?php echo $projects['owner'];?></td>
			<td><?php echo $projects['priority'];?></td>
			<td><?php echo $projects['status'];?></td>
			<td><?php echo $projects['name'];?></td>
			<td><?php echo $projects['description'];?></td>
			<td><?php echo $projects['url_dev'];?></td>
			<td><?php echo $projects['url_prod'];?></td>
			<td><?php echo $projects['created'];?></td>
			<td><?php echo $projects['modified'];?></td>
			<td><?php echo $projects['published'];?></td>
			<td><?php echo $projects['upload_max'];?></td>
			<td><?php echo $projects['phase_set'];?></td>
			<td><?php echo $projects['type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pm_projects', 'action' => 'view', $projects['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pm_projects', 'action' => 'edit', $projects['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pm_projects', 'action' => 'delete', $projects['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projects['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Projects', true), array('controller' => 'pm_projects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
