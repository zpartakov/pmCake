<div class="progLanguages view">
<h2><?php  __('Prog Language');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $progLanguage['ProgLanguage']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lib'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $progLanguage['ProgLanguage']['lib']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Note'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $progLanguage['ProgLanguage']['note']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Mod'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $progLanguage['ProgLanguage']['date_mod']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $progLanguage['ProgLanguage']['url']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prog Language', true), array('action' => 'edit', $progLanguage['ProgLanguage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Prog Language', true), array('action' => 'delete', $progLanguage['ProgLanguage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $progLanguage['ProgLanguage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prog Languages', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prog Language', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fonctions', true), array('controller' => 'fonctions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fonction', true), array('controller' => 'fonctions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Fonctions');?></h3>
	<?php if (!empty($progLanguage['Fonction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Lib'); ?></th>
		<th><?php __('Fonction'); ?></th>
		<th><?php __('Note'); ?></th>
		<th><?php __('Date Mod'); ?></th>
		<th><?php __('Prog Language Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($progLanguage['Fonction'] as $fonction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $fonction['id'];?></td>
			<td><?php echo $fonction['lib'];?></td>
			<td><?php echo $fonction['fonction'];?></td>
			<td><?php echo $fonction['note'];?></td>
			<td><?php echo $fonction['date_mod'];?></td>
			<td><?php echo $fonction['prog_language_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'fonctions', 'action' => 'view', $fonction['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'fonctions', 'action' => 'edit', $fonction['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'fonctions', 'action' => 'delete', $fonction['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fonction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fonction', true), array('controller' => 'fonctions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
