<?php
App::import('Lib', 'functions'); //imports app/libs/functions
?>
<div class="pmTasksTimes view">
<h2><?php  __('Pm Tasks Time');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTasksTime['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $pmTasksTime['PmProject']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Task'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTasksTime['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $pmTasksTime['PmTask']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmTasksTime['PmMember']['name'], array('controller' => 'pm_members', 'action' => 'view', $pmTasksTime['PmMember']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hours'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['hours']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['comments']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTasksTime['PmTasksTime']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Tasks Time', true), array('action' => 'edit', $pmTasksTime['PmTasksTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Tasks Time', true), array('action' => 'delete', $pmTasksTime['PmTasksTime']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmTasksTime['PmTasksTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
