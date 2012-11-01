<div class="faqs form">
<?php echo $this->Form->create('Faq');?>
	<fieldset>
		<legend><?php __('Add Faq'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Faqs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>