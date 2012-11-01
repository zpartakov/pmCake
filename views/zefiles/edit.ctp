<?php
$this->pageTitle="Modifier Document";
?>

<div class="zefiles form">
	<h2><?php echo $this->pageTitle;?></h2>
	<fieldset>
 		<legend><?php __('Edit Zefile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('task_id');
		
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
		echo $this->Form->input('data');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Zefile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Zefile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Zefiles', true), array('action' => 'index'));?></li>
	</ul>
</div>
