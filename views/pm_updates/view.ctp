<div class="pmUpdates view">
<h2><?php  __('Pm Update');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmUpdate['PmUpdate']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmUpdate['PmUpdate']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Task'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pmUpdate['PmTask']['name'], array('controller' => 'pm_tasks', 'action' => 'view', $pmUpdate['PmTask']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmUpdate['PmUpdate']['member']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmUpdate['PmUpdate']['comments']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmUpdate['PmUpdate']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Update', true), array('action' => 'edit', $pmUpdate['PmUpdate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Update', true), array('action' => 'delete', $pmUpdate['PmUpdate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmUpdate['PmUpdate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Updates', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Update', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
