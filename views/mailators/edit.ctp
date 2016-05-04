<div class="mailators form">
<?php echo $this->Form->create('Mailator');?>
	<fieldset>
		<legend><?php __('Edit Mailator'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pm_organization_id');
		echo $this->Form->input('pm_project_id');
		echo $this->Form->input('pm_task_id');
		echo $this->Form->input('statut_id');
		echo $this->Form->input('date');
		echo $this->Form->input('mailfrom');
		echo $this->Form->input('mailto');
		echo $this->Form->input('mailcc');
		echo $this->Form->input('mailbcc');
		echo $this->Form->input('subject');
		echo $this->Form->input('body');
		echo $this->Form->input('attachment');
		echo $this->Form->input('rem');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Mailator.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Mailator.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mailators', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Organizations', true), array('controller' => 'pm_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Organization', true), array('controller' => 'pm_organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Tasks', true), array('controller' => 'pm_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Task', true), array('controller' => 'pm_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuts', true), array('controller' => 'statuts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Statut', true), array('controller' => 'statuts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mail Answers', true), array('controller' => 'mail_answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mail Answer', true), array('controller' => 'mail_answers', 'action' => 'add')); ?> </li>
	</ul>
</div>