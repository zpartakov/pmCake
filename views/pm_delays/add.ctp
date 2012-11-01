<div class="pmDelays form">
<?php echo $this->Form->create('PmDelay');?>
	<fieldset>
 		<legend><?php __('Add Pm Delay'); ?></legend>
	<?php
		echo $this->Form->input('days');
		echo $this->Form->input('lib');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Delays', true), array('action' => 'index'));?></li>
	</ul>
</div>