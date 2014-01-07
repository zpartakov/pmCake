<div class="pmMenus index">
	<h2><?php __('Pm Menus');?></h2>
	<!-- begin search form -->
	<?php

	echo $form->create("PmMenu",array('action' => 'index'));
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
<?php echo $this->Html->link(__('New Pm Menu', true), array('action' => 'add')); ?>
<!-- end search form -->  
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lib');?></th>
			<th><?php echo $this->Paginator->sort('parent');?></th>
			<th><?php echo $this->Paginator->sort('rank');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('img');?></th>
			<th><?php echo $this->Paginator->sort('style_li');?></th>
			<th><?php echo $this->Paginator->sort('style_img');?></th>
			<th><?php echo $this->Paginator->sort('target');?></th>
			<th><?php echo $this->Paginator->sort('moddate');?></th>
			<th><?php echo $this->Paginator->sort('line_after');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmMenus as $pmMenu):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pmMenu['PmMenu']['id']; ?>&nbsp;</td>
		<td><?php 
		//show hierarchy
		if($pmMenu['PmMenu']['parent']!="0") {
			#for($i=0;$i<$pmMenu['PmMenu']['rank'];$i++) {
				echo "&nbsp;>&nbsp;";
			#}
		}
		echo $pmMenu['PmMenu']['lib']; 
		
		?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['parent']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['rank']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['url']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['img']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['style_li']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['style_img']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['target']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['moddate']; ?>&nbsp;</td>
		<td><?php echo $pmMenu['PmMenu']['line_after']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pmMenu['PmMenu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pmMenu['PmMenu']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pmMenu['PmMenu']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmMenu['PmMenu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pm Menu', true), array('action' => 'add')); ?></li>
	</ul>
</div>
