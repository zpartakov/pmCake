<?
$this->pageTitle="Logins obsolètes";
?>
<div class="obsoletelogins index">
<a href="<? echo CHEMIN; ?>obsoletelogins/index/page:1/sort:lastmodif/direction:asc"><h2><?php __('Logins obsolètes');?></h2></a>
<a href="http://www.unige.ch/outils/phpMyAdmin/db_structure.php?db=userweb">Base MySQL userweb silene</a>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Obsoletelogin', true), array('action'=>'add')); ?></li>
	</ul>
	<ul>
		<li><a href="?sel=all">Tous les logins obsolètes - y compris ceux à garder</a>&nbsp;<em>les logins à garder sont précédés du signe "+"</em></li>
	</ul>
</div><!-- search -->
<p>
<?php
   echo $form->create("Obsoletelogin",array('action' => 'search'));
    echo $form->input("q", array('label' => 'Search for'));
    echo $form->end("Search"); 
?></p>
<p>
<?php

echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('datenotifpostmaster');?></th>
	<th><?php echo $paginator->sort('login');?></th>
	<th><?php echo $paginator->sort('mail');?></th>
	<th><?php echo $paginator->sort('group');?></th>
	<th><?php echo $paginator->sort('server');?></th>
	<th><?php echo $paginator->sort('path');?></th>
	<th><?php echo $paginator->sort('garant');?></th>
	<th><?php echo $paginator->sort('lastmodif');?></th>
	<th><?php echo $paginator->sort('remarques');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($obsoletelogins as $obsoletelogin):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link(__($obsoletelogin['Obsoletelogin']['id'], true), array('action'=>'edit', $obsoletelogin['Obsoletelogin']['id'])); ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['datenotifpostmaster']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['login']; ?>
		</td>
		<td>
			<?php echo "<a href=mailto:" .$obsoletelogin['Obsoletelogin']['mail'] .">" .$obsoletelogin['Obsoletelogin']['mail'] ."</a>"; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['group']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['server']; ?>
		</td>
		<td>
			<?php 
			echo "<a title=\"voir site\" target=\"_blank\" href=\"http://" .$obsoletelogin['Obsoletelogin']['server'] .ereg_replace("^/w3","",$obsoletelogin['Obsoletelogin']['path']) ."\">" .$obsoletelogin['Obsoletelogin']['path'] ."</a>";
			 ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['garant']; ?>
		</td>
		<td>
			<?php echo $obsoletelogin['Obsoletelogin']['lastmodif']; ?>
		</td>
		<td>
			<?php echo substr($obsoletelogin['Obsoletelogin']['remarques'],0,25)."..."; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $obsoletelogin['Obsoletelogin']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $obsoletelogin['Obsoletelogin']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $obsoletelogin['Obsoletelogin']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $obsoletelogin['Obsoletelogin']['id'])); ?>
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
		<li><?php echo $html->link(__('New Obsoletelogin', true), array('action'=>'add')); ?></li>
	</ul>
</div>
