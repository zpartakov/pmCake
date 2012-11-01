<div class="webcalReminders form">
<?php echo $this->Form->create('WebcalReminder');?>
	<fieldset>
		<legend><?php __('Add Webcal Reminder'); ?></legend>
	<?php
		echo $this->Form->input('cal_date');
		echo $this->Form->input('cal_offset');
		echo $this->Form->input('cal_related');
		echo $this->Form->input('cal_before');
		echo $this->Form->input('cal_last_sent');
		echo $this->Form->input('cal_repeats');
		echo $this->Form->input('cal_duration');
		echo $this->Form->input('cal_times_sent');
		echo $this->Form->input('cal_action');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Webcal Reminders', true), array('action' => 'index'));?></li>
	</ul>
</div>