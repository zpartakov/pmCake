<div class="faqs view">
<h2><?php  __('Faq');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['lib']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Short Answer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['short_answer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Answer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['answer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pm Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($faq['PmProject']['name'], array('controller' => 'pm_projects', 'action' => 'view', $faq['PmProject']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail From'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['mail_from']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['mail_title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['mail_body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mail Sign'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['mail_sign']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['rem']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Mod'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faq['Faq']['date_mod']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faq', true), array('action' => 'edit', $faq['Faq']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Faq', true), array('action' => 'delete', $faq['Faq']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faq['Faq']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Faqs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faq', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Project', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
