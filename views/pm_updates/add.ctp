<div class="pmUpdates form">
<?php echo $this->Form->create('PmUpdate');?>
	<fieldset>
 		<legend><?php __('Add Pm Update'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('item');
		echo $this->Form->input('member');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Updates', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>