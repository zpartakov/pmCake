<div class="webcalEntries form">
<?php echo $this->Form->create('WebcalEntry');?>
	<fieldset>
		<legend><?php __('Add Webcal Entry'); ?></legend>
	<?php
		echo $this->Form->input('cal_group_id');
		echo $this->Form->input('cal_ext_for_id');
		echo $this->Form->input('cal_create_by');
		echo $this->Form->input('cal_date');
		echo $this->Form->input('cal_time');
		echo $this->Form->input('cal_mod_date');
		echo $this->Form->input('cal_mod_time');
		echo $this->Form->input('cal_duration');
		echo $this->Form->input('cal_due_date');
		echo $this->Form->input('cal_due_time');
		echo $this->Form->input('cal_priority');
		echo $this->Form->input('cal_type');
		echo $this->Form->input('cal_access');
		echo $this->Form->input('cal_name');
		echo $this->Form->input('cal_location');
		echo $this->Form->input('cal_url');
		echo $this->Form->input('cal_completed');
		echo $this->Form->input('cal_description');
		echo $this->Form->input('WebcalEntryCategory');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Webcal Entries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('controller' => 'webcal_entry_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Entry Category', true), array('controller' => 'webcal_entry_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>