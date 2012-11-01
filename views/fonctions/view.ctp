<div class="fonctions view">
<h2><?php  __('Fonction');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fonction['Fonction']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fonction['Fonction']['lib']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fonction'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<pre>
			<?php echo $fonction['Fonction']['fonction']; ?>
		</pre>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Note'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fonction['Fonction']['note']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Mod'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fonction['Fonction']['date_mod']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prog Language'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fonction['ProgLanguage']['lib'], array('controller' => 'prog_languages', 'action' => 'view', $fonction['ProgLanguage']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fonction', true), array('action' => 'edit', $fonction['Fonction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Fonction', true), array('action' => 'delete', $fonction['Fonction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fonction['Fonction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fonction', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('controller' => 'prog_languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('controller' => 'prog_languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
