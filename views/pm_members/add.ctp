<div class="pmMembers form">
<?php echo $this->Form->create('PmMember');?>
	<fieldset>
 		<legend><?php __('Add Pm Member'); ?></legend>
	<?php
		echo $this->Form->input('organization');
		echo $this->Form->input('login');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('email_work');
		echo $this->Form->input('email_home');
		echo $this->Form->input('phone_work');
		echo $this->Form->input('phone_home');
		echo $this->Form->input('mobile');
		echo $this->Form->input('fax');
		echo $this->Form->input('comments');
		echo $this->Form->input('profil');
		echo $this->Form->input('logout_time');
		echo $this->Form->input('last_page');
		echo $this->Form->input('timezone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pm Members', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pm Projects', true), array('controller' => 'pm_projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects', true), array('controller' => 'pm_projects', 'action' => 'add')); ?> </li>
	</ul>
</div>