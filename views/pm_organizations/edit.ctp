<div class="pmOrganizations form">
<?php echo $this->Form->create('PmOrganization');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Pm Organization', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('city');
		echo $this->Form->input('country');
		echo $this->Form->input('phone');
		echo $this->Form->input('fax');
		echo $this->Form->input('url');
		echo $this->Form->input('email');
		echo $this->Form->input('comments');
		echo $this->Form->input('extension_logo');
		echo $this->Form->input('owner');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PmOrganization.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PmOrganization.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pm Organizations', true)), array('action' => 'index'));?></li>
	</ul>
</div>