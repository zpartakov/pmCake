<div class="pmNotes index">
	<h2><?php __('Pm Notes');?>
<?php
	$image="icons/pm/tags.png";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
?>
	</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('project');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('topic');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmNotes as $pmNote):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmNote['PmNote']['id']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['project']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['owner']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['topic']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['subject']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['description']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['date']; ?>&nbsp;</td>
		<td><?php echo $pmNote['PmNote']['published']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmNote['PmNote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmNote['PmNote']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmNote['PmNote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmNote['PmNote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Note', true), array('action' => 'add')); ?></li>
	</ul>
</div>