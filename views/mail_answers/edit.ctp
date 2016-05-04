<div class="mailAnswers form">
<?php echo $this->Form->create('MailAnswer');?>
	<fieldset>
		<legend><?php __('Edit Mail Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('mailator_id');
		echo $this->Form->input('date');
		echo $this->Form->input('last_modified');
		echo $this->Form->input('fulltext');
		echo $this->Form->input('rem');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MailAnswer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MailAnswer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mail Answers', true), array('action' => 'index'));?></li>
	</ul>
</div>