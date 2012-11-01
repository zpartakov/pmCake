<div class="joboffers form">
<?php echo $this->Form->create('Joboffer');?>
	<fieldset>
		<legend><?php __('Add Joboffer'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Joboffers', true), array('action' => 'index'));?></li>
	</ul>
</div>