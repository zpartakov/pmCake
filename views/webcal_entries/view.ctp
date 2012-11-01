<div class="webcalEntries view">
<h2><?php  __('Webcal Entry');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Group Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_group_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Ext For Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_ext_for_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Create By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_create_by']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Mod Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_mod_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Mod Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_mod_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Duration'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_duration']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Due Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_due_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Due Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_due_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Priority'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_priority']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Access'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_access']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_location']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Completed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_completed']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cal Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalEntry['WebcalEntry']['cal_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webcal Entry', true), array('action' => 'edit', $webcalEntry['WebcalEntry']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Webcal Entry', true), array('action' => 'delete', $webcalEntry['WebcalEntry']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntry['WebcalEntry']['cal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Entries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('controller' => 'webcal_entry_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('controller' => 'webcal_entry_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Webcal Entry Categories');?></h3>
	<?php if (!empty($webcalEntry['WebcalEntryCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Cal Id'); ?></th>
		<th><?php __('Cat Id'); ?></th>
		<th><?php __('Cat Order'); ?></th>
		<th><?php __('Cat Owner'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($webcalEntry['WebcalEntryCategory'] as $webcalEntryCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $webcalEntryCategory['cal_id'];?></td>
			<td><?php echo $webcalEntryCategory['cat_id'];?></td>
			<td><?php echo $webcalEntryCategory['cat_order'];?></td>
			<td><?php echo $webcalEntryCategory['cat_owner'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'webcal_entry_categories', 'action' => 'view', $webcalEntryCategory['cal_id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'webcal_entry_categories', 'action' => 'edit', $webcalEntryCategory['cal_id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'webcal_entry_categories', 'action' => 'delete', $webcalEntryCategory['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntryCategory['cal_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('controller' => 'webcal_entry_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
