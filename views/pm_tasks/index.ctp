<?php
App::import('Lib', 'functions'); //imports app/libs/functions

#cake title of the page
if($_GET['tasktype']){
	$x=": " .$_GET['tasktype'];
	$urlplus="?tasktype=".$_GET['tasktype']."&";
} else {
	$urlplus="";
}
$x='Liste des tâches' .$x;
$x=preg_replace("/Liste des tâches: ref/","Références",$x);
$x=preg_replace("/Liste des tâches: incub/","Incubateur",$x);
$this->pageTitle = $x; 
?>

<?php
if($_GET['tasktype']=="incub") { //incubateur - dreams
$image="icons/pm/ideas.png";
}elseif($_GET['tasktype']=="ref") { //incubateur - dreams
$image="icons/pm/references.png";
}



$sql="";
global $sql;
?>
<div class="pmTasks index">
<h2>
<?php echo $this->pageTitle;
echo $html->image($image, array('style'=>'vertical-align: top; width: 100px'));
?>
</h2>
<?php
if($_GET['tasktype']=="incub") { //incubateur - dreams
	//echo "incub"; exit;
print_tasks("dreams","auj"); //PROF TASKS
/*
 * ref
 */
}elseif($_GET['tasktype']=="ref") { //incubateur - dreams
print_tasks("ref","auj"); //PROF TASKS

} else {
?>
<?php

	
	
	?>
			<a href="#perso">Perso</a> | 
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('project',$urlplus);?></th>-->
			<th><?php echo $this->Paginator->sort('project',$urlplus);?></th>
			<th><?php echo $this->Paginator->sort('priority');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('due_date');?></th>
			<th><?php echo $this->Paginator->sort('milestone');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pmTasks as $pmTask):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php 
#echo "Typ: " .$pmTask['PmProject']['type'] ."-";
				/* display an icon to show project = private */
		if($pmTask['PmProject']['type']=="p") {
			perso_list();
		}
			
			echo $this->Html->link($pmTask['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $pmTask['PmProject']['id'])); ?>
		</td>
		<td><?php 

		echo $pmTask['PmTask']['priority']; ?>&nbsp;</td>
		<td><?php 
				statut($pmTask['PmTask']['status']);

#		echo $pmTask['PmTask']['status']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pmTask['PmMember']['name'], array('controller' => 'pm_members', 'action' => 'view', $pmTask['PmMember']['id'])); ?>
		</td>
		<td>
		
		<?php
echo '<a href="' .CHEMIN .'pm_tasks/view/' .$pmTask['PmTask']['id'] .'" class="tooltip">' .$pmTask['PmTask']['name'];


//echo sacha école verbes etc à revoir</a>
if(strlen($pmTask['PmTask']['description'])>0) {
	echo '<em><span></span>'.nl2br($pmTask['PmTask']['description']).'</em>';
}
echo '</a>';

?>
		</td>
		<td><?php echo $pmTask['PmTask']['due_date']; ?>&nbsp;</td>
		<td><?php echo $pmTask['PmTask']['milestone']; ?>&nbsp;</td>
		<td class="actions">		
			<?
			$idaction=$pmTask['PmTask']['id'];
			e($html->link($html->image('toolbar/add.png', array('alt' => 'Ajouter', 'title' => 'Ajouter')), array('action'=>'add'), array('escape' => false)));
			e($html->link($html->image('toolbar/loupe.png', array('alt' => 'Voir')), array('action'=>'view', $idaction), array('alt' => 'Voir', 'title' => 'Voir', 'escape' => false)));
			e($html->link($html->image('toolbar/editor.png', array('alt' => 'Modifier')), array('action'=>'edit', $idaction), array('alt' => 'Modifier', 'title' => 'Modifier', 'escape' => false)));
			$delete_text = isset($delete_text) ? $delete_text : ___d('alaxos', 'do you really want to delete this item ?', true);
			e($html->link($html->image('toolbar/drop.png', array('alt' => __d('alaxos', 'delete', true))), array('action' => 'delete', $idaction), array('alt' => ___d('alaxos', 'delete', true), 'title' => ___d('alaxos', 'delete', true), 'escape' => false), $delete_text));
			?>	
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
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('controller' => 'pm_tasks_times', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Tasks Time', true), array('controller' => 'pm_tasks_times', 'action' => 'add')); ?> </li>
	</ul>
</div>

<h1><?php echo $this->pageTitle; ?></h1>

		<a href="#prof">Prof</a> | 
		<a href="#perso">Perso</a> | 
		<a href="#demain">Demain</a> | 
		<a href="#A venir">A venir</a>
<?php 
}?>