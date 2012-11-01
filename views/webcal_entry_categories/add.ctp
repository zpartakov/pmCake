<div class="webcalEntryCategories form">
<?php echo $this->Form->create('WebcalEntryCategory');?>
	<fieldset>
		<legend><?php __('Add Webcal Entry Category'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Webcal Entry Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>