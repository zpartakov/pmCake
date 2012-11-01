<div class="webcalCategories form">
<?php echo $this->Form->create('WebcalCategory');?>
	<fieldset>
		<legend><?php __('Add Webcal Category'); ?></legend>
	<?php
		echo $this->Form->input('cat_owner');
		echo $this->Form->input('cat_name');
		echo $this->Form->input('cat_color');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Webcal Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>