<div class="joboffers index">
<h2><?php __('Joboffers');?>
<?php
	$image="icons/pm/booking-money-bag.png";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
?>

</h2>
		<!-- begin search form -->
	<?php

	echo $form->create("Joboffer",array('action' => 'index'));
	echo $form->input("q", array('label' => 'Search for'));
    //echo $form->end("Search");
     echo "</form>";
    ?>
<!-- end search form -->  
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('poste');?></th>
			<th><?php echo $this->Paginator->sort('cat');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($joboffers as $joboffer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $joboffer['Joboffer']['id']; ?>&nbsp;</td>
		<td><?php echo $joboffer['Joboffer']['poste']; ?>&nbsp;</td>
		<td><?php echo $joboffer['Joboffer']['cat']; ?>&nbsp;</td>
		<td><?php echo $joboffer['Joboffer']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $joboffer['Joboffer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $joboffer['Joboffer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $joboffer['Joboffer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $joboffer['Joboffer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Joboffer', true), array('action' => 'add')); ?></li>
	</ul>
</div>