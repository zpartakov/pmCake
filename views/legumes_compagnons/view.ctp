<div class="legumesCompagnons view">
<h2><?php  __('Legumes Compagnon');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Legume'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['legume']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Compagnon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['compagnon']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ami'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['ami']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ennemi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['ennemi']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Note'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $legumesCompagnon['LegumesCompagnon']['note']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Legumes Compagnon', true), array('action' => 'edit', $legumesCompagnon['LegumesCompagnon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Legumes Compagnon', true), array('action' => 'delete', $legumesCompagnon['LegumesCompagnon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $legumesCompagnon['LegumesCompagnon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Legumes Compagnons', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Legumes Compagnon', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
