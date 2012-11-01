<div class="obsoletelogins view">
<h2><?php  __('Obsoletelogin');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Datenotifpostmaster'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['datenotifpostmaster']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['login']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['mail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['group']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Server'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['server']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Garant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['garant']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lastmodif'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['lastmodif']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Remarques'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obsoletelogin['Obsoletelogin']['remarques']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Obsoletelogin', true), array('action'=>'edit', $obsoletelogin['Obsoletelogin']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Obsoletelogin', true), array('action'=>'delete', $obsoletelogin['Obsoletelogin']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $obsoletelogin['Obsoletelogin']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Obsoletelogins', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Obsoletelogin', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
