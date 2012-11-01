<div class="pmMenus form">
<?php echo $this->Form->create('PmMenu');?>
	<fieldset>
 		<legend><?php __('Edit Pm Menu'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lib', array("style"=>"width: 800px;"));
		echo $this->Form->input('parent');
		echo $this->Form->input('rank');
		echo $this->Form->input('url', array("style"=>"width: 800px;"));
		echo $this->Form->input('img');
		echo $this->Form->input('style_li');
		echo $this->Form->input('style_img');
		echo $this->Form->input('target');
		echo $this->Form->input('moddate');
		echo $this->Form->input('line_after');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmMenu.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmMenu.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pm Menus', true), array('action' => 'index'));?></li>
	</ul>
</div>
