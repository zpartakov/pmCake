<div class="cms form">
<?php echo $form->create('Cm');?>
	<fieldset>
 		<legend><?php __('Add Cm');?></legend>
	<?php
		echo $form->input('type_id');
		echo $form->input('server');
		echo $form->input('url');
		echo $form->input('path');
		echo $form->input('login');
		echo $form->input('email');
		echo $form->input('expires');
		echo $form->input('date');
		echo $form->input('version');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Cms', true), array('action'=>'index'));?></li>
	</ul>
</div>
