<div class="pmTimes form">
<?php echo $this->Form->create('PmTime');?>
	<fieldset>
 		<legend><?php __('Add Pm Time'); ?></legend>
	<?php
		echo $this->Form->input('hours');
		echo $this->Form->input('lib');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Times', true), array('action' => 'index'));?></li>
	</ul>
</div>