<div class="webcalEntryCategories index">
	<h2><?php __('Webcal Entry Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cal_id');?></th>
			<th><?php echo $this->Paginator->sort('cat_id');?></th>
			<th><?php echo $this->Paginator->sort('cat_order');?></th>
			<th><?php echo $this->Paginator->sort('cat_owner');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($webcalEntryCategories as $webcalEntryCategory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $webcalEntryCategory['WebcalEntryCategory']['cal_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_id']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_order']; ?>&nbsp;</td>
		<td><?php echo $webcalEntryCategory['WebcalEntryCategory']['cat_owner']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $webcalEntryCategory['WebcalEntryCategory']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $webcalEntryCategory['WebcalEntryCategory']['cal_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $webcalEntryCategory['WebcalEntryCategory']['cal_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalEntryCategory['WebcalEntryCategory']['cal_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('action' => 'add')); ?></li>
	</ul>
</div>