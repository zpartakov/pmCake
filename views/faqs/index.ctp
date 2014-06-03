<div class="faqs index">
	<h2><?php __('Faqs');
	
	App::import('Lib', 'functions'); //imports app/libs/functions
	$image="icons/pm/faq1.png";
	echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
	
	?></h2>

		<?php echo $this->Html->link(__('New Faq', true), array('action' => 'add')); ?>
<!-- begin search form -->
	<?php

	echo $form->create("Faq",array('action' => 'index'));
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
			<th><?php echo $this->Paginator->sort('short_answer');?></th>
			<th><?php echo $this->Paginator->sort('answer');?></th>
			<th><?php echo $this->Paginator->sort('pm_project_id');?></th>
			<th><?php echo $this->Paginator->sort('mail_from');?></th>
			<th><?php echo $this->Paginator->sort('mail_title');?></th>
			<th><?php echo $this->Paginator->sort('mail_body');?></th>
			<th><?php echo $this->Paginator->sort('mail_sign');?></th>
			<th><?php echo $this->Paginator->sort('rem');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($faqs as $faq):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $faq['Faq']['id']; ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['lib']; ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['short_answer']; ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['answer']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($faq['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $faq['PmProject']['id'])); ?>
		</td>
		<td><?php echo $faq['Faq']['mail_from']; ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['mail_title']; ?>&nbsp;</td>
		<td><?php echo display_resume_faqs($faq['Faq']['mail_body'],100); ?>&nbsp;</td>
		<td><?php echo substr($faq['Faq']['mail_sign'],0,50); ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['rem']; ?>&nbsp;</td>
		<td><?php echo $faq['Faq']['date_mod']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $faq['Faq']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $faq['Faq']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $faq['Faq']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faq['Faq']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Faq', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>