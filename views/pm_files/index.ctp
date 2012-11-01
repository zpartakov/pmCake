<div class="pmFiles index">
	<h2><?php __('Pm Files');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('project');?></th>
			<th><?php echo $this->Paginator->sort('task');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('size');?></th>
			<th><?php echo $this->Paginator->sort('extension');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('comments_approval');?></th>
			<th><?php echo $this->Paginator->sort('approver');?></th>
			<th><?php echo $this->Paginator->sort('date_approval');?></th>
			<th><?php echo $this->Paginator->sort('upload');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('vc_status');?></th>
			<th><?php echo $this->Paginator->sort('vc_version');?></th>
			<th><?php echo $this->Paginator->sort('vc_parent');?></th>
			<th><?php echo $this->Paginator->sort('phase');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmFiles as $pmFile):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmFile['PmFile']['id']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['owner']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['project']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['task']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['name']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['date']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['size']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['extension']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['comments']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['comments_approval']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['approver']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['date_approval']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['upload']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['published']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['status']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['vc_status']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['vc_version']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['vc_parent']; ?>&nbsp;</td>
		<td><?php echo $pmFile['PmFile']['phase']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmFile['PmFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmFile['PmFile']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmFile['PmFile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmFile['PmFile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm File', true), array('action' => 'add')); ?></li>
	</ul>
</div>