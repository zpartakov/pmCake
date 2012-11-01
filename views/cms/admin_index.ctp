<div class="cms index">
<h2><?php __('Cms');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('type_id');?></th>
	<th><?php echo $paginator->sort('server');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('path');?></th>
	<th><?php echo $paginator->sort('login');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('expires');?></th>
	<th><?php echo $paginator->sort('date');?></th>
	<th><?php echo $paginator->sort('version');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($cms as $cm):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cm['Cm']['id']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['type_id']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['server']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['url']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['path']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['login']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['email']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['expires']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['date']; ?>
		</td>
		<td>
			<?php echo $cm['Cm']['version']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $cm['Cm']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $cm['Cm']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $cm['Cm']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cm['Cm']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Cm', true), array('action'=>'add')); ?></li>
	</ul>
</div>
