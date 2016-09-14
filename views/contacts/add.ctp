<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
		<legend><?php __('Add Contact'); ?></legend>
				<div class="multicol2">

	<?php
		echo $this->Form->input('FirstName');
		echo $this->Form->input('LastName');
		echo $this->Form->input('birthdayYear', array('type'=>'text', 'label'=>'Année de naissance'));
		echo $this->Form->input('birthdayMonth', array('type'=>'text', 'label'=>'Mois de naissance'));
		echo $this->Form->input('birthdayD', array('type'=>'text', 'label'=>'Jour de naissance'));
		echo $this->Form->input('Notes');
		echo $this->Form->input('EmailAddress');
		echo $this->Form->input('Email2Address');
		echo $this->Form->input('Email3Address');
		echo $this->Form->input('PrimaryPhone');
		echo $this->Form->input('HomePhone');
		echo $this->Form->input('HomePhone2');
		echo $this->Form->input('MobilePhone');
		echo $this->Form->input('Fax');
		echo $this->Form->input('HomeAddress');
		echo $this->Form->input('Profession');
		echo $this->Form->input('Category');
	?>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index'));?></li>
	</ul>
</div>
