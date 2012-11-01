<div class="pmFiles form">
<?php echo $this->Form->create('PmFile');?>
	<fieldset>
 		<legend><?php __('Edit Pm File'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('owner');
		echo $this->Form->input('project');
		echo $this->Form->input('task');
		echo $this->Form->input('name');
		echo $this->Form->input('date');
		echo $this->Form->input('size');
		echo $this->Form->input('extension');
		echo $this->Form->input('comments');
		echo $this->Form->input('comments_approval');
		echo $this->Form->input('approver');
		echo $this->Form->input('date_approval');
		echo $this->Form->input('upload');
		echo $this->Form->input('published');
		echo $this->Form->input('status');
		echo $this->Form->input('vc_status');
		echo $this->Form->input('vc_version');
		echo $this->Form->input('vc_parent');
		echo $this->Form->input('phase');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmFile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmFile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Files', true), array('action' => 'index'));?></li>
	</ul>
</div>