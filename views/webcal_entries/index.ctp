<div class="webcalEntries index">
	<h2><?php __('Webcal Entries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cal_id');?></th>
			<th><?php echo $this->Paginator->sort('cal_group_id');?></th>
			<th><?php echo $this->Paginator->sort('cal_ext_for_id');?></th>
			<th><?php echo $this->Paginator->sort('cal_create_by');?></th>
			<th><?php echo $this->Paginator->sort('cal_date');?></th>
			<th><?php echo $this->Paginator->sort('cal_time');?></th>
			<th><?php echo $this->Paginator->sort('cal_mod_date');?></th>
			<th><?php echo $this->Paginator->sort('cal_mod_time');?></th>
			<th><?php echo $this->Paginator->sort('cal_duration');?></th>
			<th><?php echo $this->Paginator->sort('cal_due_date');?></th>
			<th><?php echo $this->Paginator->sort('cal_due_time');?></th>
			<th><?php echo $this->Paginator->sort('cal_priority');?></th>
			<th><?php echo $this->Paginator->sort('cal_type');?></th>
			<th><?php echo $this->Paginator->sort('cal_access');?></th>
			<th><?php echo $this->Paginator->sort('cal_name');?></th>
			<th><?php echo $this->Paginator->sort('cal_location');?></th>
			<th><?php echo $this->Paginator->sort('cal_url');?></th>
			<th><?php echo $this->Paginator->sort('cal_completed');?></th>
			<th><?php echo $this->Paginator->sort('cal_description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($webcalEntries as $webcalEntry):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_group_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_ext_for_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_create_by']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_date']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_time']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_mod_date']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_mod_time']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_duration']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_due_date']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_due_time']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_priority']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_type']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_access']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_name']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_location']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_url']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_completed']; ?>&nbsp;</td>
		<td><?php echo $webcalEntry['WebcalEntry']['cal_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $webcalEntry['WebcalEntry']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $webcalEntry['WebcalEntry']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $webcalEntry['WebcalEntry']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntry['WebcalEntry']['cal_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Webcal Entry', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('controller' => 'webcal_entry_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('controller' => 'webcal_entry_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>