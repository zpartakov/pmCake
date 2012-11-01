<div class="faqs form">
<?php echo $this->Form->create('Faq');?>
	<fieldset>
		<legend><?php __('Edit Faq'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lib');
		echo $this->Form->input('short_answer');
		echo $this->Form->input('answer');
		echo $this->Form->input('pm_project_id');
		echo $this->Form->input('mail_from');
		echo $this->Form->input('mail_title');
		echo $this->Form->input('mail_body');
		echo $this->Form->input('mail_sign');
		echo $this->Form->input('rem');
		echo $this->Form->input('date_mod');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Faq.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Faq.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Faqs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>