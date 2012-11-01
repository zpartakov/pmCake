<div class="fonctions form">
<?php echo $this->Form->create('Fonction');?>
	<fieldset>
		<legend><?php __('Add Fonction'); ?></legend>
	<?php
		echo $this->Form->input('lib');
		echo $this->Form->input('fonction');
		echo $this->Form->input('note');
		echo $this->Form->input('date_mod');
		echo $this->Form->input('prog_language_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fonctions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('controller' => 'prog_languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('controller' => 'prog_languages', 'action' => 'add')); ?> </li>
	</ul>
</div>