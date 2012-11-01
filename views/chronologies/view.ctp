<div class="chronologies view">
<h2><?php  __('Chronology');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chronology['Chronology']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chronology['Chronology']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chronology['Chronology']['lib']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pays'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chronology['Chronology']['pays']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chronology', true), array('action' => 'edit', $chronology['Chronology']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Chronology', true), array('action' => 'delete', $chronology['Chronology']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chronology['Chronology']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chronologies', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chronology', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
