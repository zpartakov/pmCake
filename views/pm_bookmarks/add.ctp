<?php
//Configure::write('debug', 2);
//echo date("Y-m-d"); exit;
?>
<div class="pmBookmarks form">
<?php echo $this->Form->create('PmBookmark');?>
	<fieldset>
 		<legend><?php __('Add Pm Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('owner',array('value'=>' '));
		echo $this->Form->input('category',array('value'=>' '));
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
		echo $this->Form->input('shared');
		echo $this->Form->input('home');
		echo $this->Form->input('comments');
		echo $this->Form->input('users');
		//$options=array('value' => date("Y-m-d");
		//echo $this->Form->input('created', $options);
		//echo $this->Form->input('created', date("Y-m-d"));
		echo $this->Form->input('created', array("type"=>'hidden', 'value' => date("Y-m-d H:i:s")));
		//echo $this->Form->input('modified', array("type"=>'text', 'value' => date("Y-m-d H:i:s")));
		//echo $this->Form->input('created', array('value' => date("Y-m-d"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Bookmarks', true), array('action' => 'index'));?></li>
	</ul>
</div>
