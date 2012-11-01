<div class="externes form">
<?php echo $form->create('Externe');?>
	<fieldset>
 		<legend><?php __('Add Externe');?></legend>
	<?php
		echo $form->input('server');
		echo $form->input('login');
		echo $form->input('uid');
		echo $form->input('email');
		echo $form->input('garant');
		echo $form->input('email2');
		echo $form->input('path');
		echo $form->input('rem');
		echo $form->input('date');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Externes', true), array('action'=>'index'));?></li>
	</ul>
</div>
