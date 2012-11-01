<div class="pmEvents view">
<h2><?php  __('Pm Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['event_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['notes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmEvent['PmEvent']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Event', true), array('action' => 'edit', $pmEvent['PmEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Event', true), array('action' => 'delete', $pmEvent['PmEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmEvent['PmEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Events', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Event', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
