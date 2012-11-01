<div class="pmMenus form">
<?php echo $this->Form->create('PmMenu');?>
	<fieldset>
 		<legend><?php __('Add Pm Menu'); ?></legend>
	<?php
		echo $this->Form->input('lib');
		echo $this->Form->input('parent');
		echo $this->Form->input('rank');
		echo $this->Form->input('url');
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

		<li><?php echo $this->Html->link(__('List Pm Menus', true), array('action' => 'index'));?></li>
	</ul>
</div>