<div class="progLanguages index">
	<h2><?php __('Prog Languages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lib');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($progLanguages as $progLanguage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $progLanguage['ProgLanguage']['id']; ?>&nbsp;</td>
		<td><?php echo $progLanguage['ProgLanguage']['lib']; ?>&nbsp;</td>
		<td><?php echo $progLanguage['ProgLanguage']['note']; ?>&nbsp;</td>
		<td><?php echo $progLanguage['ProgLanguage']['date_mod']; ?>&nbsp;</td>
		<td><?php echo $progLanguage['ProgLanguage']['url']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $progLanguage['ProgLanguage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $progLanguage['ProgLanguage']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $progLanguage['ProgLanguage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $progLanguage['ProgLanguage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('controller' => 'fonctions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fonction', true), array('controller' => 'fonctions', 'action' => 'add')); ?> </li>
	</ul>
</div>