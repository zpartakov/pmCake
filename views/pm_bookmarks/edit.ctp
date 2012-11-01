<div class="pmBookmarks form">
<?php echo $this->Form->create('PmBookmark');?>
	<fieldset>
 		<legend><?php __('Edit Pm Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('owner');
		echo $this->Form->input('category');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
		echo $this->Form->input('shared');
		echo $this->Form->input('home');
		echo $this->Form->input('comments');
		echo $this->Form->input('users');
		echo $this->Form->input('modified', array("type"=>'hidden', 'value' => date("Y-m-d H:i:s")));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmBookmark.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmBookmark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Bookmarks', true), array('action' => 'index'));?></li>
	</ul>
</div>
