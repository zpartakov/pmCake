<div class="patchadmins form">
<?php echo $form->create('Patchadmin');?>
	<fieldset>
 		<legend><?php __('Add Patchadmin');?></legend>
	<?php
		echo $form->input('server');
		echo $form->input('type');
		echo $form->input('db');
		echo $form->input('sqlserver');
		echo $form->input('contenu');
		echo $form->input('url');
		echo $form->input('racine');
		echo $form->input('login');
		echo $form->input('mdp');
		echo $form->input('loginmysql');
		echo $form->input('passwdmysql');
		echo $form->input('urladmin');
		echo $form->input('loginadmin');
		echo $form->input('passwdadmin');
		echo $form->input('version');
		echo $form->input('todos');
		echo $form->input('rem');
		echo $form->input('miseajour');
		echo $form->input('scriptpatch');
		echo $form->input('typetrans');
		echo $form->input('priv');
		echo $form->input('meladmin');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Patchadmins', true), array('action'=>'index'));?></li>
	</ul>
</div>
