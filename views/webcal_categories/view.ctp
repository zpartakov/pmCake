<div class="webcalCategories view">
<h2><?php  __('Webcal Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalCategory['WebcalCategory']['cat_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalCategory['WebcalCategory']['cat_owner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalCategory['WebcalCategory']['cat_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat Color'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $webcalCategory['WebcalCategory']['cat_color']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webcal Category', true), array('action' => 'edit', $webcalCategory['WebcalCategory']['cat_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Webcal Category', true), array('action' => 'delete', $webcalCategory['WebcalCategory']['cat_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $webcalCategory['WebcalCategory']['cat_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webcal Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webcal Category', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
