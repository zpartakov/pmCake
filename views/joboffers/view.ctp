<div class="joboffers view">
<h2><?php  __('Joboffer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $joboffer['Joboffer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Poste'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $joboffer['Joboffer']['poste']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lettre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($joboffer['Joboffer']['lettre']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $joboffer['Joboffer']['cat']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $joboffer['Joboffer']['date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Joboffer', true), array('action' => 'edit', $joboffer['Joboffer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Joboffer', true), array('action' => 'delete', $joboffer['Joboffer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $joboffer['Joboffer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Joboffers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Joboffer', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
