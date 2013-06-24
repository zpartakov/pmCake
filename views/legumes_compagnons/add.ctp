<div class="legumesCompagnons form">
<?php echo $this->Form->create('LegumesCompagnon');?>
	<fieldset>
		<legend><?php __('Add Legumes Compagnon'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Legumes Compagnons', true), array('action' => 'index'));?></li>
	</ul>
</div>