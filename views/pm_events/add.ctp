<div class="pmEvents form">
<?php echo $this->Form->create('PmEvent');?>
	<fieldset>
 		<legend><?php __('Add Pm Event'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('event_date');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Events', true), array('action' => 'index'));?></li>
	</ul>
</div>