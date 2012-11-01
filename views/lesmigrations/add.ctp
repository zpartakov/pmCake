<div class="lesmigrations form">

	<?php echo $this->AlaxosForm->create('Lesmigration');?>
	
 	<h2><?php ___('add lesmigration'); ?></h2>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('serveursource') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('serveursource', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('serveurcible') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('serveurcible', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('type_id') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('type_id', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('urlsource') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('urlsource', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('urlcible') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('urlcible', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('pathsrc') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('pathsrc', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('pathcible') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('pathcible', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('datedebut') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('datedebut', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('datefin') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('datefin', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('user_id') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('user_id', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('loginresp') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loginresp', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('emailscc') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('emailscc', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('loginscc') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loginscc', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('ticket') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ticket', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('vhost') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('vhost', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('unix') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('unix', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('mysql') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('mysql', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limesurvey') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('limesurvey', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limesrc') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('limesrc', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limecible') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('limecible', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('cms') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cms', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('statut_id') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('statut_id', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('temps_prevu') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('temps_prevu', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('temps_reel') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('temps_reel', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('parent') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('parent', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('difficulte') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('difficulte', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
