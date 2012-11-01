<?php
#cake title of the page
$this->pageTitle = 'Liste des clients/usagers'; 
?>
<div class="pmOrganizations index">
	<h2><?php echo $this->pageTitle; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmOrganizations as $pmOrganization):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmOrganization['PmOrganization']['id']; ?>&nbsp;</td>
		<td>
		<a href="<? echo CHEMIN;?>pm_organizations/view/<? echo $pmOrganization['PmOrganization']['id']; ?>" title="Détail">
		<? echo $pmOrganization['PmOrganization']['name'];?>
		</a>
&nbsp;</td>
		<td><?php echo $pmOrganization['PmOrganization']['phone']; ?>&nbsp;</td>
		<td><?php echo "<a href=\"mailto:" .$pmOrganization['PmOrganization']['email'] ."\">" .$pmOrganization['PmOrganization']['email'] ."</a>"; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmOrganization['PmOrganization']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmOrganization['PmOrganization']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmOrganization['PmOrganization']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmOrganization['PmOrganization']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Organization', true), array('action' => 'add')); ?></li>
	</ul>
</div>
