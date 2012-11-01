<?php
#cake title of the page
$this->pageTitle = 'Ajouter client/usager'; 
?>
<div class="pmOrganizations form">
<?php echo $this->Form->create('PmOrganization');?>
	<fieldset>
 		<legend><?php echo $this->pageTitle; ?></legend>
	<?php
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
		#echo $this->Form->input('owner');
		
	?>
<label>Responsable</label>
	<select id="PmOrganizationOwner" name="data[PmOrganization][owner]">
	<?
membres_sel($this->Form->value('owner'));
?>
	</select>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Organizations', true), array('action' => 'index'));?></li>
	</ul>
</div>
