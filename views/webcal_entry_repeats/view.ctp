<div class="webcalEntryRepeats view">
<h2><?php  __('Webcal Entry Repeat');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Endtime'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_endtime']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Frequency'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_frequency']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Days'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_days']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Bymonth'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bymonth']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Bymonthday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bymonthday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Byday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Bysetpos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bysetpos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Byweekno'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byweekno']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Byyearday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byyearday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Wkst'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_wkst']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Count'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_count']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webcal Entry Repeat', true), array('action' => 'edit', $webcalEntryRepeat['WebcalEntryRepeat']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Webcal Entry Repeat', true), array('action' => 'delete', $webcalEntryRepeat['WebcalEntryRepeat']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntryRepeat['WebcalEntryRepeat']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Repeats', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry Repeat', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
