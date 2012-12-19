<?php 
	$this->pageTitle = "Ajout utilisateur";
?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('shortname');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('date_created');
		echo $this->Form->input('date_modified');
		echo $this->Form->input('date_deleted');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Basesmysqls', true), array('controller' => 'basesmysqls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Basesmysql', true), array('controller' => 'basesmysqls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lesmigrations', true), array('controller' => 'lesmigrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lesmigration', true), array('controller' => 'lesmigrations', 'action' => 'add')); ?> </li>
	</ul>
</div>