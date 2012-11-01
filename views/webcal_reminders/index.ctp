<div class="webcalReminders index">
	<h2><?php __('Webcal Reminders');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cal_id');?></th>
			<th><?php echo $this->Paginator->sort('cal_date');?></th>
			<th><?php echo $this->Paginator->sort('cal_offset');?></th>
			<th><?php echo $this->Paginator->sort('cal_related');?></th>
			<th><?php echo $this->Paginator->sort('cal_before');?></th>
			<th><?php echo $this->Paginator->sort('cal_last_sent');?></th>
			<th><?php echo $this->Paginator->sort('cal_repeats');?></th>
			<th><?php echo $this->Paginator->sort('cal_duration');?></th>
			<th><?php echo $this->Paginator->sort('cal_times_sent');?></th>
			<th><?php echo $this->Paginator->sort('cal_action');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($webcalReminders as $webcalReminder):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_id']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_date']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_offset']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_related']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_before']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_last_sent']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_repeats']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_duration']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_times_sent']; ?>&nbsp;</td>
		<td><?php echo $webcalReminder['WebcalReminder']['cal_action']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $webcalReminder['WebcalReminder']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $webcalReminder['WebcalReminder']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $webcalReminder['WebcalReminder']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalReminder['WebcalReminder']['cal_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Webcal Reminder', true), array('action' => 'add')); ?></li>
	</ul>
</div>