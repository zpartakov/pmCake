<div class="webcalReminders form">
<?php echo $this->Form->create('WebcalReminder');?>
	<fieldset>
		<legend><?php __('Edit Webcal Reminder'); ?></legend>
	<?php
		echo $this->Form->input('cal_id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('WebcalReminder.cal_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('WebcalReminder.cal_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Webcal Reminders', true), array('action' => 'index'));?></li>
	</ul>
</div>