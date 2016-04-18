<div class="hours form">
<?php echo $this->Form->create('Hour');?>
	<fieldset>
		<legend><?php __('Edit Hour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('year');
		echo $this->Form->input('week_nb');
		echo $this->Form->input('hours_to_do');
		echo $this->Form->input('hours_done');
		echo $this->Form->input('days_holidays');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Hour.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Hour.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hours', true), array('action' => 'index'));?></li>
	</ul>
</div>