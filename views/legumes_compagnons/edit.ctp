<div class="legumesCompagnons form">
<?php echo $this->Form->create('LegumesCompagnon');?>
	<fieldset>
		<legend><?php __('Edit Legumes Compagnon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('legume');
		echo $this->Form->input('compagnon');
		echo $this->Form->input('ami');
		echo $this->Form->input('ennemi');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('LegumesCompagnon.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('LegumesCompagnon.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Legumes Compagnons', true), array('action' => 'index'));?></li>
	</ul>
</div>