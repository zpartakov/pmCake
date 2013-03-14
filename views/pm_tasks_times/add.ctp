<?php
App::import('Lib', 'functions'); //imports app/libs/functions
#cake title of the page
$this->pageTitle = 'Ajouter temps de travail à une tâche'; 
?>
<?
	$projectid=$_GET['projectid'];
	$idtache=$_GET['idtache'];
?>
		<div class="pmTasksTimes form">
<?php echo $this->Form->create('PmTasksTime');?>
	<fieldset>
 		<legend><?php echo $this->pageTitle; ?></legend>
 		
 		<label>Projet</label>
 		<select id="PmTasksTimeProject" name="data[PmTasksTime][project]">
 		<? projets_sel($projectid); ?>
 		</select>
 		<br/>
 		<label>Tâche</label>
 		<select id="PmTasksTimeTask" name="data[PmTasksTime][task]">
 			<? tasks_sel($idtache); ?>
 		</select>
	<?php
		$changer="'remarqueheuretask','".$projectid ."','".$idtache ."'";
		echo $this->Form->input('owner', array('type'=>'hidden', 'value'=>'3')); //todo: current user session-based
		echo $this->Form->input('date', array('value'=>date('Y-m-d')));
		//echo $this->Form->input('hours', array('label'=>'Heures', 'style'=>'width: 70px;', 'id'=>'heuretask', 'onChange' => "ajout_heure($changer)"));
		echo $this->Form->input('hours', array('label'=>'Heures', 'style'=>'width: 70px;', 'id'=>'heuretask'));
		echo "<strong>Commencer par noter les heures</strong>";
		echo $this->Form->input('comments', array('label'=>'Remarques', 'id'=>'remarqueheuretask', 'onChange' => "ajout_heure($changer)"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
