<div class="pmMembers index">
	<h2><?php __('Pm Members');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('organization');?></th>
			<th><?php echo $this->Paginator->sort('login');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email_work');?></th>
			<th><?php echo $this->Paginator->sort('phone_work');?></th>
			<th><?php echo $this->Paginator->sort('profil');?></th>
			<th><?php echo $this->Paginator->sort('mobile');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmMembers as $pmMember):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmMember['PmMember']['id']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['organization']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['login']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['name']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['email_work']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['phone_work']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['mobile']; ?>&nbsp;</td>
		<td><?php echo $pmMember['PmMember']['profil']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmMember['PmMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmMember['PmMember']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmMember['PmMember']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmMember['PmMember']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
