<div class="pmTasksTimes form">
<?php 
App::import('Lib', 'functions'); //imports app/libs/functions
echo $this->Form->create('PmTasksTime');
?>
	<fieldset>
 		<legend><?php __('Edit Pm Tasks Time'); ?></legend>
 				
<h2>Projet: <?php projet_nom_print($this->Form->value('project')); ?></h2>
<h3>Tâche: <?php task_nom_print($this->Form->value('task')); ?></h3>
<br/>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project', array('type'=>'hidden'));
		echo $this->Form->input('task', array('type'=>'hidden'));
		echo $this->Form->input('owner', array('type'=>'hidden'));
		echo $this->Form->input('date');
		echo $this->Form->input('hours');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmTasksTime.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmTasksTime.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Tasks Times', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Members', true), array('controller' => 'pm_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Member', true), array('controller' => 'pm_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
