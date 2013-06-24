<div class="legumesCompagnons index">
	<h2><?php __('Legumes Compagnons');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('legume');?></th>
			<th><?php echo $this->Paginator->sort('compagnon');?></th>
			<th><?php echo $this->Paginator->sort('ami');?></th>
			<th><?php echo $this->Paginator->sort('ennemi');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($legumesCompagnons as $legumesCompagnon):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['id']; ?>&nbsp;</td>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['legume']; ?>&nbsp;</td>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['compagnon']; ?>&nbsp;</td>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['ami']; ?>&nbsp;</td>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['ennemi']; ?>&nbsp;</td>
		<td><?php echo $legumesCompagnon['LegumesCompagnon']['note']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $legumesCompagnon['LegumesCompagnon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $legumesCompagnon['LegumesCompagnon']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $legumesCompagnon['LegumesCompagnon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $legumesCompagnon['LegumesCompagnon']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Legumes Compagnon', true), array('action' => 'add')); ?></li>
	</ul>
</div>