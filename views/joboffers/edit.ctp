<div class="joboffers form">
<?php echo $this->Form->create('Joboffer');?>
	<fieldset>
		<legend><?php __('Edit Joboffer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('poste');
		echo $this->Form->input('lettre');
		echo $this->Form->input('cat');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Joboffer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Joboffer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Joboffers', true), array('action' => 'index'));?></li>
	</ul>
</div>