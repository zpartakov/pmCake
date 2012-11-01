<div class="fonctions form">
<?php echo $this->Form->create('Fonction');?>
	<fieldset>
		<legend><?php __('Edit Fonction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lib', array("style"=>"width: 800px;"));
		echo $this->Form->input('fonction', array("style"=>"width: 800px; height: 300px;"));
		echo $this->Form->input('note');
		echo $this->Form->input('date_mod', array("type"=>"text", "value"=>date("Y-m-d h:i:s")));
		echo $this->Form->input('prog_language_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Fonction.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Fonction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('controller' => 'prog_languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('controller' => 'prog_languages', 'action' => 'add')); ?> </li>
	</ul>
</div>