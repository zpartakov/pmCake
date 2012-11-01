<div class="progLanguages form">
<?php echo $this->Form->create('ProgLanguage');?>
	<fieldset>
		<legend><?php __('Edit Prog Language'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProgLanguage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProgLanguage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('controller' => 'fonctions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fonction', true), array('controller' => 'fonctions', 'action' => 'add')); ?> </li>
	</ul>
</div>