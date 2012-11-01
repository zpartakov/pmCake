<div class="chronologies form">
<?php echo $this->Form->create('Chronology');?>
	<fieldset>
		<legend><?php __('Add Chronology'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('lib');
		echo $this->Form->input('pays');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chronologies', true), array('action' => 'index'));?></li>
	</ul>
</div>