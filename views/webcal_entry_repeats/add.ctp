<div class="webcalEntryRepeats form">
<?php echo $this->Form->create('WebcalEntryRepeat');?>
	<fieldset>
		<legend><?php __('Add Webcal Entry Repeat'); ?></legend>
	<?php
		echo $this->Form->input('cal_type');
		echo $this->Form->input('cal_end');
		echo $this->Form->input('cal_endtime');
		echo $this->Form->input('cal_frequency');
		echo $this->Form->input('cal_days');
		echo $this->Form->input('cal_bymonth');
		echo $this->Form->input('cal_bymonthday');
		echo $this->Form->input('cal_byday');
		echo $this->Form->input('cal_bysetpos');
		echo $this->Form->input('cal_byweekno');
		echo $this->Form->input('cal_byyearday');
		echo $this->Form->input('cal_wkst');
		echo $this->Form->input('cal_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Webcal Entry Repeats', true), array('action' => 'index'));?></li>
	</ul>
</div>