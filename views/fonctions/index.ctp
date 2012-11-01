<div class="fonctions index">
	<h2><?php __('Fonctions');?></h2>
	<!-- begin search form -->
	<?php

	echo $form->create("Fonction",array('action' => 'index'));
	?>
	<table>
		<tr>
			<td>     
			<?
				echo $form->input("q", array('label' => 'Search for'));
			?>
</td>
			<td>    <?
    echo $form->end("Search"); 
    ?></td>
		</tr>
	</table>
<!-- end search form --> 
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lib');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
			<th><?php echo $this->Paginator->sort('prog_language_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fonctions as $fonction):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $fonction['Fonction']['id']; ?>&nbsp;</td>
		<td><?php echo $fonction['Fonction']['lib']; ?>&nbsp;</td>
		<td><?php echo $fonction['Fonction']['date_mod']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fonction['ProgLanguage']['lib'], array('controller' => 'prog_languages', 'action' => 'view', $fonction['ProgLanguage']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $fonction['Fonction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $fonction['Fonction']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $fonction['Fonction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fonction['Fonction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fonction', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('controller' => 'prog_languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('controller' => 'prog_languages', 'action' => 'add')); ?> </li>
	</ul>
</div>