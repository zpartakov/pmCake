<div class="pmDelays form">
<?php echo $this->Form->create('PmDelay');?>
	<fieldset>
 		<legend><?php __('Edit Pm Delay'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('days');
		echo $this->Form->input('lib');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmDelay.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmDelay.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Delays', true), array('action' => 'index'));?></li>
	</ul>
</div>