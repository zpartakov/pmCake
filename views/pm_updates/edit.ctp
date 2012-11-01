<div class="pmUpdates form">
<?php echo $this->Form->create('PmUpdate');?>
	<fieldset>
 		<legend><?php __('Edit Pm Update'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmUpdate.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmUpdate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Updates', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>