<div class="webcalReminders view">
<h2><?php  __('Webcal Reminder');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Offset'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_offset']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Related'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_related']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Before'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_before']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Last Sent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_last_sent']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Repeats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_repeats']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Duration'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_duration']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Times Sent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_times_sent']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Action'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalReminder['WebcalReminder']['cal_action']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webcal Reminder', true), array('action' => 'edit', $webcalReminder['WebcalReminder']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Webcal Reminder', true), array('action' => 'delete', $webcalReminder['WebcalReminder']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalReminder['WebcalReminder']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Reminders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Reminder', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
