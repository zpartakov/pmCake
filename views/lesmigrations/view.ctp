<div class="lesmigrations view">
	
	<h2><?php ___('lesmigration');?></h2>
	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $lesmigration['Lesmigration']['id'], 'delete_id' => $lesmigration['Lesmigration']['id'], 'delete_text' => ___('do you really want to delete this lesmigration ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('serveursource'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			serveur($lesmigration['Lesmigration']['serveursource']);
			#echo $lesmigration['Lesmigration']['serveursource']; 
			
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('serveurcible'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#serveur($lesmigration['Lesmigration']['serveurcible']);
			valeur('servers',$lesmigration['Lesmigration']['serveurcible'],'canonical');
			#echo $lesmigration['Server']['canonical']; 
			 ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('type id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#echo $lesmigration['Lesmigration']['type_id']; 
						valeur('types',$lesmigration['Lesmigration']['type_id'],'lib');

			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('urlsource'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#echo $lesmigration['Lesmigration']['urlsource']; 
			
			urlise($lesmigration['Lesmigration']['urlsource']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('urlcible'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#echo $lesmigration['Lesmigration']['urlcible']; 
			urlise($lesmigration['Lesmigration']['urlcible']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('pathsrc'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['pathsrc']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('pathcible'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['pathcible']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('datedebut'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($lesmigration['Lesmigration']['datedebut']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('datefin'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($lesmigration['Lesmigration']['datefin']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('user id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#echo 			$lesmigration['Lesmigration']['user_id'];
			urlise($lesmigration['User']['email']);
	
			 ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('loginresp'); ?>
		</td>
		<td>:</td>
		<td>
			<?php urlise($lesmigration['Lesmigration']['loginresp']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('emailscc'); ?>
		</td>
		<td>:</td>
		<td>
			<?php  urlise($lesmigration['Lesmigration']['emailscc']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('loginscc'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['loginscc']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('ticket'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['ticket']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('vhost'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['vhost']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('unix'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['unix']; 
?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('mysql'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['mysql']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limesurvey'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limesurvey']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limesrc'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limesrc']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('limecible'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['limecible']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('cms'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['cms']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('statut id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php 
			#echo $lesmigration['Lesmigration']['statut_id']; 
									echo $lesmigration['Statut']['libelle'];

?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('temps prevu'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['temps_prevu']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('temps reel'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['temps_reel']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('parent'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['parent']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('difficulte'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $lesmigration['Lesmigration']['difficulte']; ?>
		</td>
	</tr>
	</table>
</div>
