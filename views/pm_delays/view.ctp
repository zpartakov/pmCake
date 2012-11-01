<div class="pmDelays view">
<h2><?php  __('Pm Delay');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmDelay['PmDelay']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Days'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmDelay['PmDelay']['days']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmDelay['PmDelay']['lib']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Delay', true), array('action' => 'edit', $pmDelay['PmDelay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Delay', true), array('action' => 'delete', $pmDelay['PmDelay']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmDelay['PmDelay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Delays', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Delay', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
