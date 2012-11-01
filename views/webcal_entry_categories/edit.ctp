<div class="webcalEntryCategories form">
<?php echo $this->Form->create('WebcalEntryCategory');?>
	<fieldset>
		<legend><?php __('Edit Webcal Entry Category'); ?></legend>
	<?php
		echo $this->Form->input('cal_id');
		echo $this->Form->input('cat_id');
		echo $this->Form->input('cat_order');
		echo $this->Form->input('cat_owner');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('WebcalEntryCategory.cal_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('WebcalEntryCategory.cal_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>