<div class="obsoletelogins form">
<?php echo $form->create('Obsoletelogin');?>
	<fieldset>
 		<legend><?php __('Edit Obsoletelogin');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('datenotifpostmaster');
		echo $form->input('login');
		echo $form->input('mail');
		echo $form->input('group');
		echo $form->input('server');
		echo $form->input('path');
		echo $form->input('garant');
		#echo $form->input('lastmodif');
		echo $form->input('remarques');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Obsoletelogin.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Obsoletelogin.id'))); ?></li>
		<li><?php echo $html->link(__('List Obsoletelogins', true), array('action'=>'index'));?></li>
	</ul>
</div>
