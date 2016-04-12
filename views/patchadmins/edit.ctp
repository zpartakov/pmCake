<div class="patchadmins form">
<?php echo $form->create('Patchadmin');?>
	<fieldset>
 		<legend><?php __('Edit Patchadmin');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('version');
		echo $form->input('server');
		echo $form->input('url');
		echo $form->input('urladmin');
		echo $form->input('racine');
		echo $form->input('meladmin');
 		?>
 	<h2><?php __('(S)FTP');?></h2>
 	<?
		echo $form->input('login');
		echo $form->input('mdp');
		echo $form->input('miseajour');
		echo $form->input('scriptpatch');
		echo $form->input('typetrans');
		echo $form->input('priv');
 	?>
 	<h2><?php __('MySQL');?></h2>
 	<?
		echo $form->input('db');
		echo $form->input('sqlserver');
		echo $form->input('loginmysql');
		echo $form->input('passwdmysql');
 	?>
 	<h2><?php __('Type');?></h2>
 	<?
		echo $form->input('type');
		echo $form->input('contenu');
		echo $form->input('loginadmin');
		echo $form->input('passwdadmin');
 	?>
 	<h2><?php __('Div');?></h2>
 	<?
		echo $form->input('todos');
		echo $form->input('rem');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Patchadmin.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Patchadmin.id'))); ?></li>
		<li><?php echo$html->link($html->image('toolbar/edit-copy.png', array('alt' => 'Copier', 'title' => 'Copier')), array('action'=>'copier',$form->value('Patchadmin.id')), array('escape' => false)); ?></li>

		<li><?php echo $html->link(__('List Patchadmins', true), array('action'=>'index'));?></li>
	</ul>
</div>
