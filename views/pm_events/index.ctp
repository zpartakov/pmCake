http://cakephp.1045679.n5.nabble.com/Publishing-iCal-calendars-with-Cake-td1297473.html
<div class="pmEvents index">
	<h2><?php __('Pm Events');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('event_date');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmEvents as $pmEvent):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmEvent['PmEvent']['id']; ?>&nbsp;</td>
		<td><?php echo $pmEvent['PmEvent']['name']; ?>&nbsp;</td>
		<td><?php echo $pmEvent['PmEvent']['event_date']; ?>&nbsp;</td>
		<td><?php echo $pmEvent['PmEvent']['notes']; ?>&nbsp;</td>
		<td><?php echo $pmEvent['PmEvent']['created']; ?>&nbsp;</td>
		<td><?php echo $pmEvent['PmEvent']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmEvent['PmEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmEvent['PmEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmEvent['PmEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmEvent['PmEvent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Event', true), array('action' => 'add')); ?></li>
	</ul>
</div>
