<div class="mailAnswers view">
<h2><?php  __('Mail Answer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mailator Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['mailator_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['last_modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fulltext'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['fulltext']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailAnswer['MailAnswer']['rem']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mail Answer', true), array('action' => 'edit', $mailAnswer['MailAnswer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mail Answer', true), array('action' => 'delete', $mailAnswer['MailAnswer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailAnswer['MailAnswer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mail Answers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mail Answer', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
