<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('details');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('all_day');
		echo $this->Form->input('status');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Event Types', true), array('controller' => 'event_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Type', true), array('controller' => 'event_types', 'action' => 'add')); ?> </li>
	</ul>
</div>