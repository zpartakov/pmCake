<div class="chronologies form">
<?php echo $this->Form->create('Chronology');?>
	<fieldset>
		<legend><?php __('Edit Chronology'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
		echo $this->Form->input('lib');
		echo $this->Form->input('pays');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Chronology.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Chronology.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chronologies', true), array('action' => 'index'));?></li>
	</ul>
</div>