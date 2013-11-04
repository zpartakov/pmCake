<?php
$task_id=$_GET['task_id'];
$this->pageTitle="Nouveau Document pour la tâche #" .$task_id;
$_SESSION["task_id"]=$task_id;	//both define language
?>
	<h2><?php echo $this->pageTitle;?></h2>

<?
    echo $form->create('Zefile', array('action' => 'add', 'type' => 'file'));
		echo $this->Form->input('task_id',array('type'=>'text','value'=>$task_id, 'style'=>'width: 40px'));

    echo $form->file('File');
    echo $form->submit('Upload');
    echo $form->end();
?>
<hr><h1>Old</h1>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Zefiles', true), array('action' => 'index'));?></li>
	</ul>
</div>
