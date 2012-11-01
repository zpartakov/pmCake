<div class="webcalEntryRepeats index">
	<h2><?php __('Webcal Entry Repeats');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cal_id');?></th>
			<th><?php echo $this->Paginator->sort('cal_type');?></th>
			<th><?php echo $this->Paginator->sort('cal_end');?></th>
			<th><?php echo $this->Paginator->sort('cal_endtime');?></th>
			<th><?php echo $this->Paginator->sort('cal_frequency');?></th>
			<th><?php echo $this->Paginator->sort('cal_days');?></th>
			<th><?php echo $this->Paginator->sort('cal_bymonth');?></th>
			<th><?php echo $this->Paginator->sort('cal_bymonthday');?></th>
			<th><?php echo $this->Paginator->sort('cal_byday');?></th>
			<th><?php echo $this->Paginator->sort('cal_bysetpos');?></th>
			<th><?php echo $this->Paginator->sort('cal_byweekno');?></th>
			<th><?php echo $this->Paginator->sort('cal_byyearday');?></th>
			<th><?php echo $this->Paginator->sort('cal_wkst');?></th>
			<th><?php echo $this->Paginator->sort('cal_count');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($webcalEntryRepeats as $webcalEntryRepeat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_type']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_end']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_endtime']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_frequency']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_days']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bymonth']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bymonthday']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byday']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_bysetpos']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byweekno']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_byyearday']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_wkst']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryRepeat['WebcalEntryRepeat']['cal_count']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $webcalEntryRepeat['WebcalEntryRepeat']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $webcalEntryRepeat['WebcalEntryRepeat']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $webcalEntryRepeat['WebcalEntryRepeat']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntryRepeat['WebcalEntryRepeat']['cal_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Webcal Entry Repeat', true), array('action' => 'add')); ?></li>
	</ul>
</div>