<div class="mailAnswers index">
	<h2><?php __('Mail Answers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('mailator_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('last_modified');?></th>
			<th><?php echo $this->Paginator->sort('fulltext');?></th>
			<th><?php echo $this->Paginator->sort('rem');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mailAnswers as $mailAnswer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mailAnswer['MailAnswer']['id']; ?>&nbsp;</td>
		<td><?php echo $mailAnswer['MailAnswer']['mailator_id']; ?>&nbsp;</td>
		<td><?php echo $mailAnswer['MailAnswer']['date']; ?>&nbsp;</td>
		<td><?php echo $mailAnswer['MailAnswer']['last_modified']; ?>&nbsp;</td>
		<td><?php echo $mailAnswer['MailAnswer']['fulltext']; ?>&nbsp;</td>
		<td><?php echo $mailAnswer['MailAnswer']['rem']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mailAnswer['MailAnswer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mailAnswer['MailAnswer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mailAnswer['MailAnswer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailAnswer['MailAnswer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mail Answer', true), array('action' => 'add')); ?></li>
	</ul>
</div>