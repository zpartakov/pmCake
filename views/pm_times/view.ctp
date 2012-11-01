<div class="pmTimes view">
<h2><?php  __('Pm Time');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTime['PmTime']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hours'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTime['PmTime']['hours']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmTime['PmTime']['lib']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Time', true), array('action' => 'edit', $pmTime['PmTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Time', true), array('action' => 'delete', $pmTime['PmTime']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmTime['PmTime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Times', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Time', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
