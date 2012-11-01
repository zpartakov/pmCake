<div class="webcalEntryCategories view">
<h2><?php  __('Webcal Entry Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryCategory['WebcalEntryCategory']['cal_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_owner']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webcal Entry Category', true), array('action' => 'edit', $webcalEntryCategory['WebcalEntryCategory']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Webcal Entry Category', true), array('action' => 'delete', $webcalEntryCategory['WebcalEntryCategory']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntryCategory['WebcalEntryCategory']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
