<div class="progLanguages form">
<?php echo $this->Form->create('ProgLanguage');?>
	<fieldset>
		<legend><?php __('Add Prog Language'); ?></legend>
	<?php
		echo $this->Form->input('lib');
		echo $this->Form->input('note');
		echo $this->Form->input('date_mod');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('controller' => 'fonctions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fonction', true), array('controller' => 'fonctions', 'action' => 'add')); ?> </li>
	</ul>
</div>